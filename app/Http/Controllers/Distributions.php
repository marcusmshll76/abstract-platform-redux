<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Illuminate\Support\Facades\Storage;
use DateTime;

class Distributions extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth.details');
    }

    public function distributions(Request $request, $type, $rand, $id) {
        $data = $request->session()->get('distributions');
        return view( 'investor-servicing.distributions.index', [ 'title' => 'Distributions > Investor Servicing'] )->with(compact('data', 'type', 'id'));
    }

    public function preview(Request $request, $type, $rand, $id) {
        $data = $request->session()->get('distributions');
        $msg = '';
        return view( 'investor-servicing.distributions.preview', [ 'title' => 'Preview Distributions > Investor Servicing'] )->with(compact('msg', 'data', 'type', 'id'));
    }
    
    // Submit Preview Data
    public function submitDistributions(Request $request) {
        $session_data = session( 'distributions', array() );
        $session_data = array_merge( $session_data, $_POST );
        session( [ 'distributions' => $session_data ] );

        $type = $request->get('tid');
        $id = $request->get('did');
        $name = $request->get('name');

        $rules = [
            'name' => 'required',
            'date' => 'required',
            'yield' => 'required',
            'cashFlowtype' => 'required',
            'totalAmount' => 'required'
        ];
        
        $this->validate($request, $rules);

        $userid = Auth::id();
        if (isset($type) && isset($id)) {
            if ($type === 'fund') {
                $table = 'security_fund_flow';
                $q = 'fund-name as name';
            } else if ($type === 'property') {
                $table = 'security_flow_property';
                $q = 'property as name';
            } else if ($type === 'sproperty') {
                $table = 'property';
                $q = 'opportunity_name as name';
            }

            if ($type === 'sproperty') {
                $data = DB::table($table)
                ->where('userid', $userid)
                ->where('id', $id)
                ->select($q, 'captables')
                ->first();
            } else {
                $data = DB::table($table)
                ->where('userid', $userid)
                ->where('id', $id)
                ->select($q, 'captables', 'investor-first-name as fn', 'investor-last-name as ln', 'ownership as ow', 'investor-first-name-1 as fn1', 'investor-last-name-1 as ln1', 'ownership-1 as ow1', 'investor-first-name-2 as fn2', 'investor-last-name-2 as ln2', 'ownership-2 as ow2')
                ->first();
            }
            if (!empty($data->captables)) {
                $filePath = storage_path('app/').$userid. '/' .$id. '/';
                $filename = $name .' (Generated by Abstract Tokenization)' .'.csv';
                $nPath = $userid. '/' .$id. '/';
                if (!file_exists($filePath)) {
                    mkdir($filePath);
                }
                
                touch($filePath.$filename);
                
                $reader = ReaderEntityFactory::createReaderFromFile($filePath.$filename);
                // $writer = WriterEntityFactory::createXLSXWriter();
                $writer = WriterEntityFactory::createCSVWriter();
                $writer->setShouldAddBOM(false);
                $writer->openToFile($filePath.$filename);
                /** Create a style with the StyleBuilder **/
                /* $wrap = (new StyleBuilder())
                ->setShouldWrapText()
                ->build(); */

                $x = json_decode($data->captables)->original->response;
                $totalAmount = $request->get('totalAmount');
                if (!empty($x)) {
                    foreach ($x as $key => $row) {
                        $rowData = array();
                        if ($key === "columns") {

                            foreach ($row as $k => $cell) {
                                if (!empty($cell)) {
                                    array_push($rowData, WriterEntityFactory::createCell($cell));
                                }
                            }

                            array_push($rowData, WriterEntityFactory::createCell('Distribution Amount'));
                            $columns = WriterEntityFactory::createRow($rowData);
                            $writer->addRow($columns);

                        } else if ($key === 'rows') {

                            foreach ($row as $k => $cell) {
                                $cellArr = array();
                                $percent = 0;
                                foreach ($cell as $c => $rowcells) {
                                    if (!empty($rowcells)) {
                                        if (!is_object($rowcells)) {
                                            if ($c === 1) {
                                                $rowcells = sprintf('%.2f%%', $rowcells * 100);
                                                $percent = $rowcells;
                                            }
                                            if ($c === 3) {
                                                $rowcells = '$'.number_format($rowcells);
                                            }
                                            array_push($cellArr, WriterEntityFactory::createCell($rowcells));
                                        } else {
                                            $dt = new DateTime($rowcells->date);
                                            array_push($cellArr, WriterEntityFactory::createCell($dt->format('Y-m-d')));
                                        }
                                    }
                                }
                                $o = str_replace('%','', $percent);
                                if (strpos($totalAmount, ',') !== false) {
                                    $z = preg_replace('/,+/', '', $totalAmount);
                                } else if (strpos($totalAmount, '$') !== false) {
                                    $z = preg_replace('/\$+/', '', $totalAmount);
                                } else {
                                    $z = $totalAmount;
                                }
                                $pval = ($o / 100) * preg_replace('/,+/', '', $z);
                                
                                array_push($cellArr, WriterEntityFactory::createCell('$'.number_format($pval)));
                                $rowCelldata = WriterEntityFactory::createRow($cellArr);
                                $writer->addRow($rowCelldata);
                            }
                            

                        }
                    }
                    $writer->close();

                    $payload = [
                        'userid' => $userid,
                        'parent' => $id,
                        'type' => $type,
                        'name' => $request->get('name'),
                        'date' => $request->get('date'), 
                        'yield' => $request->get('yield'), 
                        'cashFlowtype' => $request->get('cashFlowtype'), 
                        'totalAmount' => $request->get('totalAmount'),
                        'file' =>  $nPath.$filename,
                        "created_at" =>  \Carbon\Carbon::now(),
                        "updated_at" => \Carbon\Carbon::now()
                    ];

                    Storage::disk('s3')->put($nPath.$filename, file_get_contents($filePath.$filename));
                    Storage::disk('local')->delete($filePath.$filename);

                    DB::table('distributions')->insert($payload);

                    return view( 'investor-servicing.distributions.index', [ 'title' => 'Distributions > Investor Servicing', 'success' => true ] )->with(compact('type', 'id'));
                }
            }
        } 
        
    }

    public function download (Request $request) {

        $rules = [
            'name' => 'required',
            'date' => 'required',
            'yield' => 'required',
            'cashFlowtype' => 'required',
            'totalAmount' => 'required'
        ];
        
        $this->validate($request, $rules);

        $type = $request->get('tid');
        $id = $request->get('did');
        $name = $request->get('name');

        $userid = Auth::id();

        $data = DB::table('distributions')
        ->where('userid', $userid)
        ->where('parent', $id)
        ->where('name', $name)
        ->select('file')
        ->first();
        if ($data) {
            $adapter = Storage::disk('s3')->getDriver()->getAdapter();
            if (!empty($data->file)) {
                $path = $data->file;
                $command = $adapter->getClient()->getCommand('GetObject', [
                     'Bucket' => $adapter->getBucket(),
                     'Key'    => $adapter->getPathPrefix().$path
                 ]);
                 $request = $adapter->getClient()->createPresignedRequest($command, '+20 minute');
                 $data = (string) $request->getUri();
                 if (isset($data)) {
                     $f = file_get_contents($data);
                     $z = $name.' (Generated by Abstract Tokenization).csv';
                    $headers = [
                        'Content-Type' => 'text/csv', 
                        'Content-Description' => 'File Transfer',
                        'Content-Disposition' => "attachment; filename={$z}",
                        'filename'=> $z
                     ];
                     return response($f, 200, $headers);
                 } else {
                    $msg = 'Distribution file not found';
                    return view( 'investor-servicing.distributions.preview', [ 'title' => 'Preview Distributions > Investor Servicing', 'errors' => true ] )->with(compact('msg','type', 'id'));
                 }

             }
        } else {
            $msg = 'Distribution does not exist, please check your inputs';
            return view( 'investor-servicing.distributions.preview', [ 'title' => 'Preview Distributions > Investor Servicing', 'errors' => true ] )->with(compact('msg','type', 'id'));
        }
    }
    public function display($path, $type, $id, $name) {
        
    }
}
