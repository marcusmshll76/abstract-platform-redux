<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class FilesController extends Controller

{
    // Upload Files
    public function store(Request $request){
        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|max:2048'
            ]);
            $file = $request->file('image');
        } 
        if ($request->hasFile('file')) {
            $this->validate($request, [
                'file' =>  'required|max:2048'
            ]);
            $file = $request->file('file');
        }

        // File Name
        $filename = time() . str_replace(' ', '', $file->getClientOriginalName());
        $section = $request->get('section');

        if ($request->get('access') === 'private') {
            $user = Auth::id();
            if (isset($user)) { 
                $filePath = $user . $request->get('structure') . $filename;  
                $matchArr = [
                    'user' => $user, 
                    'field' => $request->get('field')
                ];

                $allfiles = DB::table('files')
                    ->where($matchArr)
                    ->first();

                /* if ($request->get('multi') === 'no' && !empty($allfiles)) {
                    Storage::disk('s3')->delete($allfiles->path);

                    DB::table('files')
                    ->where($matchArr)
                    ->delete();

                }
                $map = str_random(5).$user;
                $mmap = $request->get('map');

                $payload = array(
                    'user' => $user, 
                    'field' => $request->get('field'),
                    'name' => $filename,
                    'map' => $map,
                    'section' => $mmap,
                    'path' => $filePath,
                    'created_at' =>  \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                );

                DB::table('files')->insert($payload);
                $request->session()->push($mmap, $payload);

            } else {
                return response()->json([
                    'response' => 'Not Authenticated'
                ]);
            }
        } */
            /*// Set Private Path
            
             */
        /* } else{
            // Set Public Path
            $filePath = 'public/' . $request->get('structure') . $allfiles;
        }
        
        Storage::disk('s3')->put($filePath, file_get_contents($file));
        */

        /* $ext = pathinfo($filePath, PATHINFO_EXTENSION);
        if ($ext == 'csv' || $ext == 'ods' || $ext == 'xlsx' || $ext == 'XLSX') {
            if ($section === 'captable') {
                Storage::disk('local')->put($filePath, file_get_contents($file));
                $r =  $this->readDocFiles($filePath);
                $request->session()->put('capRead', $r);
            } else if ($section === 'reports') {
                $request->session()->put('reportRead', $filePath);
            } else if ($section === 'tax') {
                $request->session()->put('taxRead', $filePath);
            }
        } else {
            if ($section === 'tax') {
                $request->session()->put('taxRead', $filePath);
            } else if ($section === 'reports') {
                $request->session()->put('reportRead', $filePath);
            } else {
                // $request->session()->put('docsRead', $r);
            }
        }

        return response()->json([
            'message' => 'File uploaded successfully',
            'response' => $payload,
            'status' => 200
        ]); */
    }

    public function readDocFiles($path) {
        $file = storage_path('app/' . $path);
        $reader = ReaderEntityFactory::createReaderFromFile($file);
        $reader->open($file);

        $cells = array();
        $columns = array();
        // $i = 0;
        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $row) {
                // $numItems = count($row);
                foreach ($sheet->getRowIterator() as $count => $row) {
                    $rowData = array();
                    if ($count > 3) {
                        foreach ($row->getCells() as $key => $a) { 
                            array_push($rowData, $a->getValue());
                        }
                        array_push($cells, $rowData);
                    } else if($count === 3) {
                        foreach ($row->getCells() as $key => $a) { 
                            array_push($columns, $a->getValue());
                        }
                    }
                }
            }
        }
        $total = array_pop($cells);
        $reader->close();
        Storage::disk('local')->delete($file);
        return response()->json([
            'message' => 'File Read successfully',
            'response' => [
                'columns' => $columns,
                'rows' => $cells,
                'total' => $total
            ],
            'status' => 200
        ]);  
    }

    // Retrieve Files
    public function retrieve(Request $request){
       $user = $request->query('user');
       $path = $request->query('path');

        if (!empty($request->query('section_id'))) {
            $matchArr = [
                'user' => $request->query('user'),
                'field' => $request->query('field'),
                'section' => $request->query('section'),
                'section_id' => $request->query('sectionid')
            ];
        } else {
            $matchArr = [
                'user' => $request->query('user'),
                'field' => $request->query('field'),
                'section' => $request->query('section')
            ];
        }

       if (isset($user)) {
        
            $allfiles = DB::table('files')
                ->where($matchArr)
                ->select('path')
                ->orderBy('id', 'desc')
                ->get();

            if (!empty($allfiles)) {
                return $this->display($allfiles);
            }

       } else {
            return $this->display($path);
       }
    }

    // Display Files
    public function display($a = null, $path = null) {
       $adapter = Storage::disk('s3')->getDriver()->getAdapter();
       if (!empty($path)) {
            $files = Storage::disk('s3')->files($path);
       } else {
           $files = $a;
       }

       $data = [];
       foreach ($files as $file) {
           if (!empty($path)) {
                $x = $file;
           } else {
                $x = $file->path;
           }
            $command = $adapter->getClient()->getCommand('GetObject', [
                'Bucket' => $adapter->getBucket(),
                'Key'    => $adapter->getPathPrefix().$x
            ]);
            $request = $adapter->getClient()->createPresignedRequest($command, '+20 minute');
            $data[] = [
                'path' => $x,
                'src' => (string) $request->getUri()
            ];
        } 
        return response()->json($data);
    }

    // Delete Files
    public function destroy(Request $request) {
       $filepath = $request->query('f');
       Storage::disk('s3')->delete($filepath);

       DB::table('files')
        ->where('path', $filepath)
        ->delete();
       
       return response()->json([
            'response' => 'File deleted successfully'
       ]);
   }

   // Create diligence default structure
   public function checkDir () {
       $user = Auth::id();
        if (isset($user)) {
            $dir = $user. '/diligence';
            $cloudFiles = Storage::disk('s3')->allFiles($dir);
            if (!empty($cloudFiles)) {
                return response()->json([
                    'response' => $cloudFiles
                ]);
            } else {
                $localFiles = Storage::disk('local')->allFiles('diligence');
                foreach($localFiles as $file) {
                    if (strpos($file, '.DS_Store') === false) {
                        Storage::disk('s3')->put($file, $user.'/'.$file);
                    }  
                }
                return response()->json([
                    'response' => $localFiles
                ]);
            }
        } else {
            return response()->json([
                'response' => 'Not Authenticated'
            ]);
        }
   }

   // Move Files
   public function move(Request $request){
        $odir = $request->get('oldDir');
        $ndir = $request->get('newDir');
        if (isset($odir) && isset($ndir)) {
            Storage::disk('s3')->move($odir, $ndir);
        }
   }
}