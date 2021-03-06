<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class InvestorServicingController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth.details');
    } 

    
    public function k1() {
        return view( 'investor-servicing.investor-K-1.index', [ 'title' => 'K1 > Investor Servicing'] );
    }

    public function choose(Request $request) {
        $userid = Auth::id();

        if( $request->site->id == 1 ) {
            // @TODO support more than just the property table
            $data = DB::table('property')
                ->where( 'userid', $userid )
                ->select('opportunity_name as name', 'id')
                ->addSelect(DB::raw("'sproperty' as fakeType"))
                ->get();
        } else {
            // First, fetch all of my investments.
            $my_investments = DB::table( 'investments' )
                ->where( 'userid', $userid )
                ->pluck('propertyid');

            // Next, determine which are visible on this microsite.
            $valid_microsite_sponsors = DB::table('microsite_sponsors' )
                ->select( 'sponsorid' )
                ->where( 'siteid', $request->site->id )
                ->pluck( 'sponsorid' );

            // Now, fetch each property that matches
            // @TODO support more than just the property table
            $data = DB::table('property')
                ->whereIn('userid', $valid_microsite_sponsors)
                ->whereIn('id', $my_investments)
                ->select('opportunity_name as name', 'id')
                ->addSelect(DB::raw("'sproperty' as fakeType"))
                ->get();
        }

        return view( 'investor-servicing.choose.investment', [ 'title' => 'Choose Investment > Investor Servicing'] )->with(compact('data', 'userid'));
    }

    public function captable(Request $request, $type, $rand, $id) {
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
            if (!empty($request->session()->get('capRead'))) {
                
                $docs = json_encode($request->session()->get('capRead'));
                DB::table($table)
                    ->where('userid', $userid)
                    ->where('id', $id)
                    ->update(['captables' => $docs]);

                    $request->session()->forget('capRead');
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

            return view( 'investor-servicing.cap.table', [ 'title' => 'Cap Table Management > Investor Servicing'] )->with(compact('data', 'type', 'id'));
        } else {
            return redirect('/investor-servicing/choose-investment');
        }
    }
    public function ownershipCap (Request $request, $type, $rand, $id) {
        $userid = Auth::id();
        if (isset($type) && isset($id)) {
            $property_details = DB::table( 'property' )
            ->where( 'id', $id )
            ->first();
        
            $investment_details = DB::table( 'investments' )
                ->where( 'userid', $userid )
                ->where( 'propertyid', $id )
                ->first();
            
            $distributions = DB::table( 'distributions' )
                ->where( 'userid', $userid )
                ->where( 'property_id', $id )
                ->select('totalAmount','name')
                ->get();
                
            return view( 'subdomain.investor-servicing.cap.table', [ 'title' => 'Cap Table Management > Investor Servicing'] )->with(compact('property_details', 'investment_details', 'distributions', 'type', 'id'));
        } else {
            return redirect('/investor-servicing/choose-investment');
        }
    }

    public function taxCreate (Request $request) {
        $session_data = session( 'tax', array() );
        $session_data = array_merge( $session_data, $_POST );
        session( [ 'tax' => $session_data ] );
        $type = $request->get('tid');
        $id = $request->get('did');
        $userid = Auth::id();
        $rules = [
            'document' => 'required',
            'year' => 'required',
        ];
        $this->validate($request, $rules);
        if (!empty($request->session()->get('taxRead'))) {
            $taxRead = $request->session()->get('taxRead');
            $payload = [
                'userid' => $userid,
                'parent' => $id,
                'type' =>  $type,
                'document' => $request->get('document'),
                'year' => $request->get('year'), 
                'file' =>  $taxRead,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ];
            
            DB::table('taxs')->insert($payload);
            $request->session()->forget('taxRead');
            return view( 'investor-servicing.tax.index', [ 'title' => 'Tax Documents > Investor Servicing', 'success' => true ] )->with(compact('type', 'id'));
            // ->with(compact('data', 'type', 'id')); return redirect();
        } else {
            $data = $request->session()->get('tax');
            return view( 'investor-servicing.tax.index', [ 'title' => 'Tax Documents > Investor Servicing', 'errors' => true] )->with(compact('data', 'type', 'id'));
        }
    }

    public function reportsCreate (Request $request) {
        $session_data = session( 'report', array() );
        $session_data = array_merge( $session_data, $_POST );
        session( [ 'report' => $session_data ] );
        $type = $request->get('tid');
        $id = $request->get('did');
        $userid = Auth::id();
        $rules = [
            'quater' => 'required',
            'year' => 'required',
            'month' => 'required',
        ];
        $this->validate($request, $rules);
        if (!empty($request->session()->get('reportRead'))) {
            $reportRead = $request->session()->get('reportRead');
            $payload = [
                'userid' => $userid,
                'parent' => $id,
                'type' =>  $type,
                'quater' => $request->get('quater'),
                'month' => $request->get('month'),
                'year' => $request->get('year'),
                'file' =>  $reportRead,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ];
            
            DB::table('reports')->insert($payload);
            $request->session()->forget('reportRead');
            return redirect('/investor-servicing/reports/dt/'. $type. '/'.strtolower(str_random(30)). '/' .$id);
        } else {
            $data = $request->session()->get('report');
            return view( 'investor-servicing.tax.index', [ 'title' => 'Reports > Investor Servicing', 'errors' => true] )->with(compact('data', 'type', 'id'));
        }
    }

    public function getSession(Request $request) {
        return $request->session()->get('capRead');
    }

    public function tax(Request $request, $type, $rand, $id) {
        return view( 'investor-servicing.tax.index', [ 'title' => 'Tax Documents > Investor Servicing'] )->with(compact('type', 'id'));
    }

    public function reports(Request $request, $type, $rand, $id) {
        return view( 'investor-servicing.reports.index', [ 'title' => 'Reports > Investor Servicing'] )->with(compact('type', 'id'));
    }

    public function dst(Request $request, $type, $rand, $id) {
        $userid = Auth::id();
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

        $data = DB::table($table)
            ->where('userid', $userid)
            ->select($q, 'id')
            ->first();

        return view( 'investor-servicing.dst.index', [ 'title' => 'Reports > Investor Servicing'] )->with(compact('data', 'type', 'id'));
    }

    public function final (Request $request) {
        $userid = Auth::id();
        $bio = DB::table('account_verification')
            ->where('userid', $userid)
            ->value('bio');
        $data = $request->session()->get('security-flow');
        return view( 'security-fund-flow.step-7.final', [ 'title' => 'Create Digital Security > Preview & Submit' ] )->with(compact('data', 'bio'));
    }

    public function downloadCapTableCSV( Request $request, $type, $property_id ) {
        if( $type != 'sproperty' ) {
            // @TODO implement
            return;
        }

        // Ensure this is our property
        $property = DB::table('property')->select('userid')->where( 'id', $property_id )->first();
        if( $property->userid != Auth::id() ) {
            return redirect( '/' );
        }

        // Fetch the cap table
        $cap_table = \CapTableHelper::get_cap_table( $property_id );
        
        ob_clean();
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Cache-Control: private', false);
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . 'Cap Table '.$property_id.' (Generated by Abstract Tokenization).csv');    
        if(isset($cap_table['0'])){
            $fp = fopen('php://output', 'w');
            fputcsv($fp, array_keys($cap_table['0']));
            foreach($cap_table AS $values){
                fputcsv($fp, $values);
            }
            fclose($fp);
        }
        ob_flush();
    }
}