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

    public function pending(Request $request) {
        $userid = Auth::id();

            // Now, fetch each property that matches
            // @TODO support more than just the property table
            /* $property = DB::table('property')
                ->where('userid', $userid)
                ->select('opportunity_name as name', 'id')
                ->addSelect(DB::raw("'sproperty' as fakeType")); */

            $cproperty = DB::table('security_flow_property')
                ->where('userid', $userid)
                ->where('status', 'Not Approved')
                ->select('property as name', 'id')
                ->addSelect(DB::raw("'property' as fakeType"));
            
            // $property = $property->addSelect(DB::raw("'property' as fakeType"));
            $data = DB::table('security_fund_flow')
                ->where('userid', $userid)
                ->where('status', 'Not Approved')
                ->select('fund-name as name', 'id')
                ->addSelect(DB::raw("'fund' as fakeType"))
                // ->union($property)
                ->union($cproperty)
                ->get();
            
            return view( 'my-properties.pending', [ 'title' => 'Pending > Properties'] )->with(compact('data', 'userid'));
    }

    public function approved(Request $request) {
        $userid = Auth::id();

            // Now, fetch each property that matches
            // @TODO support more than just the property table
            /* $property = DB::table('property')
                ->where('userid', $userid)
                ->select('opportunity_name as name', 'id')
                ->addSelect(DB::raw("'sproperty' as fakeType")); */

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
            
            return view( 'my-properties.approved', [ 'title' => 'Approved > Properties'] )->with(compact('data', 'userid'));
    }

    public function sticker(Request $request, $type, $rand, $id) {
        $userid = Auth::id();

        if (isset($type) && isset($id)) {
            if ($type === 'fund') {
                $table = 'security_fund_flow';
                $q = 'fund-name as name';
            } else if ($type === 'property') {
                $table = 'security_flow_property';
                $q = 'property as name';
            }

            $data = DB::table($table)
                ->where('userid', $userid)
                ->select($q, 'id')
                ->first();
            
            return view( 'my-properties.sticker', [ 'title' => 'Choose Sticker > Properties'] )->with(compact('data', 'type', 'id'));
        }
    }

    public function metrics(Request $request, $type, $rand, $id) {
        $userid = Auth::id();

        if (isset($type) && isset($id)) {
            if ($type === 'fund') {
                $table = 'security_fund_flow';
                $q = 'fund-name as name';
            } else if ($type === 'property') {
                $table = 'security_flow_property';
                $q = 'property as name';
            }

            $data = DB::table($table)
                ->where('userid', $userid)
                ->select($q, 'id', 'minimum-raise-amount as min', 'maximum-raise-amount as max', 'total-capital-required as total')
                ->first();
            
            return view( 'my-properties.recap', [ 'title' => 'Investment Metrics > Properties'] )->with(compact('data', 'type', 'id'));
        }
    }

    public function edit(Request $request, $type, $id) {
            $userid = Auth::id();
            if (isset($type) && isset($id)) {
                if ($type === 'fund') {
                    $table = 'security_fund_flow';
                    $ses = 'security-fund-flow';
                    $q = 'fund-name as name';
                } else if ($type === 'property') {
                    $table = 'security_flow_property';
                    $q = 'property as name';
                }

                $data = DB::table($table)
                    ->where('userid', $userid)
                    ->where('status', 'Not Approved')
                    ->first();

                $array = (array) $data;
                $array ['principles'] = json_decode($array['principles']);

                $request->session()->put($ses, $array);
                return redirect('/'.$ses.'/preview');
            } else {
                return redirect('/properties/pending');
            }   
    }

    public function recap(Request $request, $type, $rand, $id) {
        return view( 'my-properties.popup', [ 'title' => 'Investment Metrics > Properties'] )->with(compact('type', 'id'));
    }
}
