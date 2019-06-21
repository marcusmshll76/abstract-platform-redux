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

        $rules = [
            'opportunity_name' => 'required',
            'opportunity_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
            'bankTransfer' => 'required',
        ];

        $this->validate($request, $rules );

        if (!empty($request->session()->get('capRead'))) {
            $capRead = json_encode($request->session()->get('capRead'));
        } else {
            $capRead = '';
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
            'bankTransfer'=> $request->get('bankTransfer'),
            'captables' => $capRead,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()
        );

        // If a cap table file was uploaded, populate the appropriate information
        $cap_table = json_decode( $capRead );
        $investor_details = [];
        foreach( $cap_table->original->response->rows as $row ) {
            $investor_details[] = [
                'entity_name'   => $row[0],
                'stake'         => $row[1],
                'date'          => substr( $row[2]->date, 0, strpos( $row[2]->date, ' ' ) ),
                'capital'       => $row[3],
                'email'         => $row[4]
            ];
        }
        
       $property_id = DB::table('property')->insertGetId($payload);
       \CapTableHelper::process_cap_table( $property_id, $investor_details );
        
        $request->session()->forget('property');
        $request->session()->forget('capRead');
        
        return view( 'investor-servicing.property.index', [ 'title' => 'Upload New Property > Investor Servicing', 'success' => true ] );
    }
}
