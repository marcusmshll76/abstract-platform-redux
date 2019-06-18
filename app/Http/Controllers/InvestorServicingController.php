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
        $property = DB::table('property')
            ->where('userid', $userid)
            ->select('opportunity_name as name', 'id')
            ->addSelect(DB::raw("'sproperty' as fakeType"));

        $cproperty = DB::table('security_flow_property')
            ->where('userid', $userid)
            ->select('property as name', 'id')
            ->addSelect(DB::raw("'property' as fakeType"));
        
        // $property = $property->addSelect(DB::raw("'property' as fakeType"));

        $data = DB::table('security_fund_flow')
            ->where('userid', $userid)
            ->select('fund-name as name', 'id')
            ->addSelect(DB::raw("'fund' as fakeType"))
            ->union($property)
            ->union($cproperty)
            ->get();

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
            return view( 'subdomain.investor-servicing.cap.table', [ 'title' => 'Cap Table Management > Investor Servicing'] )->with(compact('data', 'type', 'id'));
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
            return redirect('/investor-servicing/reports/'. $type. '/'.strtolower(str_random(100)). '/' .$id);
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
            return redirect('/investor-servicing/reports/dt/'. $type. '/'.strtolower(str_random(100)). '/' .$id);
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
}