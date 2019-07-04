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
use \Nacha\File;
use \Nacha\Batch;
use Nacha\Field\TransactionCode;
use \Nacha\Record\DebitEntry;
use \Nacha\Record\CcdEntry;

class Distributions extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth.details');
    }

    public function distributions(Request $request, $type, $rand, $id) {
        $data = $request->session()->get('distributions');
        $history = DB::table('distributions')->where('property_id', $id)->where('type', $type)->get();
        return view( 'investor-servicing.distributions.index', [ 'title' => 'Distributions > Investor Servicing'] )->with(compact('data', 'type', 'id', 'history'));
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

        // Generate CSV
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
                                $fmt = new \NumberFormatter( 'en_US', \NumberFormatter::CURRENCY );
                                $currency = 'USD';
                                $z = $fmt->parseCurrency( $totalAmount, $currency );
                                $o = str_replace('%','', $percent);

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
                        'property_id' => $id,
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

                    $distribution_id = DB::table('distributions')->insertGetId($payload);

                    // Calculate per-investor distributions
                    $fmt = new \NumberFormatter( 'en_US', \NumberFormatter::CURRENCY );
                    $currency = 'USD';
                    $raw_amount = $fmt->parseCurrency( $request->get('totalAmount'), $currency );
                    $investors = DB::table('investments')->where('propertyid', $id)->get();
                    $distribution_history = [];
                    foreach( $investors as $investor ) {
                        $distribution_history[] = [
                            'property_id'       => $id,
                            'property_type'     => $type,
                            'investor_id'       => $investor->userid,
                            'distribution_id'   => $distribution_id,
                            'distribution'      => round( $raw_amount * $investor->share, 2 )
                        ];
                    }

                    DB::table('distribution_history')->insert($distribution_history);
                    
                    $history = DB::table('distributions')->where('property_id', $id)->where('type', $type)->get();
                    return view( 'investor-servicing.distributions.index', [ 'title' => 'Distributions > Investor Servicing', 'success' => true ] )->with(compact('type', 'id', 'history'));
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
        ->where('property_id', $id)
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

    public function getCSV(Request $request, $type, $rand, $distribution_id) {
        $data = DB::table('distributions')
            ->where('userid', Auth::id())
            ->where('id', $distribution_id)
            ->select('file')
            ->first();

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
                $z = 'Distribution_' . $distribution_id . '.csv';
                $headers = [
                    'Content-Type' => 'text/csv', 
                    'Content-Description' => 'File Transfer',
                    'Content-Disposition' => "attachment; filename={$z}",
                    'filename'=> $z
                ];

                    return response($f, 200, $headers);
            }
        } else {
          return redirect('/investor-servicing' );  
        }
    }

    public function getNACHA(Request $request, $type, $rand, $distribution_id) {
        $file = new File();
        $file->getHeader()->setPriorityCode(1)
			//->setImmediateDestination('')
			//->setImmediateOrigin('')
			->setFileCreationDate(date('YYMMDD'))
			->setFormatCode('1')
			//->setImmediateDestinationName('')
			//->setImmediateOriginName('')
			->setReferenceCode('Reference');

        $distribution = DB::table('distribution_history')
            ->where('distribution_history.property_type', $type)
            ->where('distribution_history.distribution_id', $distribution_id)
            ->get();
        
        
        $batch = new Batch();
        $batch->getHeader()->setCompanyEntryDescription('DISTRIBUTION');
        foreach( $distribution as $d ) {
            // Get the investor details
            $investor = DB::table('investments')
                ->where('propertyid', $d->property_id)
                ->where('type', $d->property_type)
                ->where('userid', $d->investor_id)
                ->get();
            
            $check_digit_weighting = [3, 7, 1, 3, 7, 1, 3, 7];
            $check_value = 0;
            for( $i = 0; $i < strlen( substr($investor[0]->routing_number,0,8) ); $i++ ) {
                $digit = $investor[0]->routing_number[$i];
                $digit = $digit * $check_digit_weighting[$i];
                $check_value += $digit;
            }

            while( ($check_value - 10 ) >= 0 ) {
                $check_value -= 10;
            }

            $batch->addCreditEntry((new CcdEntry)
                ->setTransactionCode(TransactionCode::CHECKING_DEPOSIT)
                ->setReceivingDFiId(substr($investor[0]->routing_number, 0, 8))
                ->setReceivingDFiAccountNumber($investor[0]->account_number)
                ->setCheckDigit($check_value)
                ->setAmount($d->distribution)
            );
        }

        $file->addBatch($batch);
        $nacha = (string)$file;

        $z = 'NACHA_Distribution_' . $distribution_id . '.txt';
        $headers = [
            'Content-Type' => 'text', 
            'Content-Description' => 'File Transfer',
            'Content-Disposition' => "attachment; filename={$z}",
            'filename'=> $z
            ];
            return response($nacha, 200, $headers);
       

    }
}
