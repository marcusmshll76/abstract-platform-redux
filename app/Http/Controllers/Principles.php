<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Principles extends Controller
{
    public function createPrinciples (Request $request) {
        $name = $request->get('name');
        $title = $request->get('title');
        $bio = $request->get('bio');
        $user = Auth::id();

        $payload = [
            'user' => $user,
            'name' => $name,
            'title' =>  $title,
            'bio' => $bio,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()
        ];
        
        $data = DB::table('principles')->insert($payload);
        return response()->json([
            'response' => $data
          ]);
    }
    public function getPrinciples(Request $request) {
        $userid = Auth::id();
        $principles = DB::table('principles')
            ->where('user', $userid)
            ->get();
        if ($principles) {
            return response()->json([
                'message' => 'Account Settings Principles',
                'response' => $principles,
                'status' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Failed',
                'status' => 490
            ]);
        }
    }
}
