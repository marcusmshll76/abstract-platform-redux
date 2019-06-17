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
        $property = DB::table('security_flow_property')
            ->where('userid', $userid)
            ->select('property as name', 'id')
            ->addSelect(DB::raw("'property' as fakeType"));
        
        // $property = $property->addSelect(DB::raw("'property' as fakeType"));

        $data = DB::table('security_fund_flow')
            ->where('userid', $userid)
            ->select('fund-name as name', 'id')
            ->addSelect(DB::raw("'fund' as fakeType"))
            ->union($property)
            ->get();

        return view( 'investor-servicing.choose.investment', [ 'title' => 'Choose Investment > Investor Servicing'] )->with(compact('data', 'userid'));
    }

    public function captable(Request $request, $type, $rand, $id) {
        $userid = Auth::id();
        if (isset($type) && isset($id)) {
            if ($type === 'fund') {
                $table = 'security_fund_flow';
                $q = 'fund-name as name';
            } else {
                $table = 'security_flow_property';
                $q = 'property as name';
            }
            $data = DB::table($table)
                ->where('userid', $userid)
                ->where('id', $id)
                ->select($q, 'investor-first-name as fn', 'investor-last-name as ln', 'ownership as ow', 'investor-first-name-1 as fn1', 'investor-last-name-1 as ln1', 'ownership-1 as ow1', 'investor-first-name-2 as fn2', 'investor-last-name-2 as ln2', 'ownership-2 as ow2')
                ->first();
            return view( 'investor-servicing.cap.table', [ 'title' => 'Cap Table Management > Investor Servicing'] )->with(compact('data'));
        } else {
            return redirect('/investor-servicing/choose-investment');
        }
    }
    public function getSession(Request $request) {
        return $request->session()->get('docsRead');
    }

    public function distributions() {
        return view( 'investor-servicing.distributions.index', [ 'title' => 'Distributions > Investor Servicing'] );
    }

    public function newProperty() {
        return view( 'investor-servicing.property.index', [ 'title' => 'Upload New Property > Investor Servicing'] );
    }

    public function tax() {
        return view( 'investor-servicing.tax.index', [ 'title' => 'Tax Documents > Investor Servicing'] );
    }

    public function reports() {
        return view( 'investor-servicing.reports.index', [ 'title' => 'Reports > Investor Servicing'] );
    }

    public function dst() {
        return view( 'investor-servicing.dst.index', [ 'title' => 'Reports > Investor Servicing'] );
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