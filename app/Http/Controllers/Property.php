<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class Property extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth.details');
    }
    
    public function newProperty(Request $request) {
        return view( 'investor-servicing.property.index', [ 'title' => 'Upload New Property > Investor Servicing'] )->with('data', $request->session()->get('property'));
    }

    // Submit Preview Data
    public function submitPreview(Request $request) {
        $session_data = session( 'property', array() );
        $session_data = array_merge( $session_data, $_POST );
        session( [ 'property' => $session_data ] );

        $capRule= [];
        if(empty($request->session()->get('docsRead'))) {
            $capRule = [
                'investor-full-name' => 'required',
                'investor-entity-name' => 'required',
                'ownership' => 'required',
                'investor-full-name-1' => 'required',
                'investor-entity-name-1' => 'required',
                'ownership-1' => 'required',
                'investor-full-name-2' => 'required',
                'investor-entity-name-2' => 'required',
                'ownership-2' => 'required',
            ];
        }
        $rules = [
            'opportunity_name' => 'required',
            'opportunity_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
            'bankTransfer' => 'required',
        ];
        $rulesCall = array_merge( $rules, $capRule);

        $this->validate($request, $rulesCall);

        if (!empty($request->session()->get('docsRead'))) {
            $docsRead = json_encode($request->session()->get('docsRead'));
        } else {
            $docsRead = '';
        }

        $userid = Auth::id();

        $payload = array(
            'userid' => $userid,
            'opportunity_name'=> $request->get('opportunity_name'),
            'opportunity_address'=> $request->get('opportunity_address'),
            'city'=> $request->get('city'),
            'state'=> $request->get('state'),
            'zipcode'=> $request->get('zipcode'),
            'country'=> $request->get('country'),
            'investor-full-name'=> $request->get('investor-full-name'),
            'investor-entity-name'=> $request->get('investor-entity-name'),
            'ownership'=> $request->get('ownership'),
            'investor-full-name-1'=> $request->get('investor-full-name-1'),
            'investor-entity-name-1'=> $request->get('investor-entity-name-1'),
            'ownership-1'=> $request->get('ownership-1'),
            'investor-full-name-2'=> $request->get('investor-full-name-2'),
            'investor-entity-name-2'=> $request->get('investor-entity-name-2'),
            'ownership-2'=> $request->get('ownership-2'),
            'bankTransfer'=> $request->get('bankTransfer'),
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()
        );

        DB::table('property')->insert($payload);
        
        $request->session()->forget('property');
        $request->session()->forget('docsRead');
        
        return view( 'investor-servicing.property.index', [ 'title' => 'Upload New Property > Investor Servicing', 'success' => true ] );
    }
}
