<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $filename = time() . $file->getClientOriginalName();

        if ($request->get('access') === 'private') {
            // Set Private Path
            $user = Auth::id();
            if (isset($user)) { 
                $filePath = $user . $request->get('structure') . $filename;
            } else {
                return response()->json([
                    'response' => 'Not Authenticated'
                ]);
            }
        } else{
            // Set Public Path
            $filePath = 'public/' . $request->get('structure') . $filename;
        }
       
        Storage::disk('s3')->put($filePath, file_get_contents($file));
        return response()->json([
            'response' => 'File uploaded successfully'
        ]);
    }

    // Retrieve Files
    public function retrieve(Request $request){
       $user = $request->query('user');
       $path = $request->query('path');

       if (isset($user)) {
            $filepath = $user . '/' . $path;
       } else {
            $filepath = $path;
       }

       $adapter = Storage::disk('s3')->getDriver()->getAdapter();
       $files = Storage::disk('s3')->files($filepath);

       $data = [];
       foreach ($files as $file) {
            $command = $adapter->getClient()->getCommand('GetObject', [
                'Bucket' => $adapter->getBucket(),
                'Key'    => $adapter->getPathPrefix().$file
            ]);
            $request = $adapter->getClient()->createPresignedRequest($command, '+20 minute');
            $data[] = [
                'name' => str_replace($filepath, '', $file),
                'src' => (string) $request->getUri()
            ];
        }
        return response()->json($data);
    }

    // Delete Files
    public function destroy($data) {
       $user = $request->query('user');
       $path = $request->query('path');

       if (isset($user)) {
            $filepath = $user . '/' . $path;
       } else {
            $filepath = $path;
       }

       Storage::disk('s3')->delete($filepath . $data);
       
       return response()->json([
            'response' => 'File deleted successfully'
       ]);
   }

}