<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class Marketplace extends Controller
{
    public function mcg(Request $request) {
        return view( 'marketplace.learnmore', [ 'title' => 'Learn More > Marketplace'] )->with('data', $request->session()->get('property'));
    }

    public function new(Request $request, $type, $id) {
        $userid = Auth::id();
        if (isset($type) && isset($id)) {
            if ($type === 'fund') {
                $table = 'security_fund_flow';
                $q = 'fund-name as name';
            } else if ($type === 'property') {
                $table = 'security_flow_property';
                $q = 'property as name';
            }

            $a = DB::table($table)
                ->where('userid', $userid)
                ->where('status', 'Not Approved')
                ->first();

            $bio = DB::table('account_verification')
                ->where('userid', $userid)
                ->value('bio');

            $data = (array) $a;

            return view( 'marketplace.final', [ 'title' => 'New > Marketplace'] )->with(compact('data', 'bio'));
            // return redirect('/'.$ses.'/preview');
        } 
}
}
