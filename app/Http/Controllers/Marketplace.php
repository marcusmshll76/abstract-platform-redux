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
        $userid = Auth::id();
        // Now, fetch each property that matches
            // @TODO support more than just the property table
            $property = DB::table('property')
                ->where('userid', $userid)
                ->select('opportunity_name as name', 'id')
                ->addSelect(DB::raw("'sproperty' as fakeType"));

            $cproperty = DB::table('security_flow_property')
                ->where('userid', $userid)
                ->where('status', 'Approved')
                ->select('property as name', 'id')
                ->addSelect(DB::raw("'property' as fakeType"));
            
            // $property = $property->addSelect(DB::raw("'property' as fakeType"));
            $data = DB::table('security_fund_flow')
                ->where('userid', $userid)
                ->where('status', 'Approved')
                ->select('fund-name as name', 'id')
                ->addSelect(DB::raw("'fund' as fakeType"))
                // ->union($property)
                ->union($cproperty)
                ->get();
            
                
            return view( 'marketplace.learnmore', [ 'title' => 'Approved > Properties'] )->with(compact('data', 'userid'));
        
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
            } else if ($type === 'sproperty') {
                $table = 'property';
                $q = 'opportunity_name as name';
            }

            $a = DB::table($table)
                ->where('userid', $userid)
                ->where('status', 'Approved')
                ->first();

            $bio = DB::table('account_verification')
                ->where('userid', $userid)
                ->value('bio');

            $data = (array) $a;

            $company = DB::table('account_verification')
            ->where('userid', $userid)
            ->select('company_name')
            ->first();

            // $data ['principles'] = json_decode($data['principles']);
            return view( 'marketplace.final', [ 'title' => 'New > Marketplace'] )->with(compact('data', 'company', 'bio'));
            // return redirect('/'.$ses.'/preview');
        } 
    }
    public function learnmoreDummy () {
        return view( 'marketplace.learnmoreDummy', [ 'title' => 'Details > Marketplace'] );
    }
}
