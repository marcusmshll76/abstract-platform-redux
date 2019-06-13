<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubInvestorServicingController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth.details');
    }

    public function choose(Request $request) {
        $userid = Auth::id();
        $property = DB::table('security_flow_property')
            ->where('userid', $userid)
            ->select('property as name', 'opportunity_type as p', 'id');

        $data = DB::table('security_fund_flow')
            ->where('userid', $userid)
            ->select('fund-name as name', 'opportunity-type as f', 'id')
            ->union($property)
            ->get();

        return view( 'investor-servicing-sub.choose.investment', [ 'title' => 'Choose Investment > Investor Servicing'] )->with(compact('data', 'userid'));
    }

    public function ownership(Request $request) {
        $data = [];
        return view( 'investor-servicing-sub.cap.table', [ 'title' => 'Cap Table Management > Investor Servicing'] )->with(compact('data'));
    }

    public function tax() {
        return view( 'investor-servicing-sub.tax.index', [ 'title' => 'Tax Documents > Investor Servicing'] );
    }

    public function reports() {
        return view( 'investor-servicing-sub.reports.index', [ 'title' => 'Reports > Investor Servicing'] );
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