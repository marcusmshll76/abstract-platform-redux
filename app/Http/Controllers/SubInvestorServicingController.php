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

        return view( 'subdomain.investor-servicing.choose.investment', [ 'title' => 'Choose Investment > Investor Servicing'] )->with(compact('data', 'userid'));
    }

    public function taxGenerate (Request $request, $type, $rand, $id) {
        // @todo Tax generation function
        return redirect('/investor-servicing/choose-investment');
    }

    public function reportsGenerate (Request $request, $type, $rand, $id) {
        // @todo Report generation function
        return redirect('/investor-servicing/choose-investment');
    }

    public function ownership(Request $request, $type, $rand, $id) {
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

            return view( 'subdomain.investor-servicing.cap.table', [ 'title' => 'Cap Table Management > Investor Servicing'] )->with(compact('data'));
        } 

    }

    public function tax(Request $request, $type, $rand, $id) {

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
            

            return view( 'subdomain.investor-servicing.tax.index', [ 'title' => 'Tax Documents > Investor Servicing'] )->with(compact('data', 'type', 'id'));
        } else {
            return redirect('/investor-servicing/choose-investment');
        }
        
    }

    public function reports(Request $request, $type, $rand, $id) {
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
            return view( 'subdomain.investor-servicing.reports.index', [ 'title' => 'Reports > Investor Servicing'] )->with(compact('data', 'type', 'id'));
        } else {
            return redirect('/investor-servicing/choose-investment');
        }
    }

    public function investorInfo(Request $request) {
        return view( 'subdomain.account-settings.investor-info.index', [ 'title' => 'Investor Information > Investor Servicing'] );
    }

    public function bank(Request $request) {
        return view( 'subdomain.account-settings.bank-account.index', [ 'title' => 'Bank Account > Investor Servicing'] );
    }

    public function consent(Request $request) {
        return view( 'subdomain.account-settings.electronic-consent.index', [ 'title' => 'Bank Account > Investor Servicing'] );
    }

    public function password(Request $request) {
        return view( 'subdomain.account-settings.password.index', [ 'title' => 'Bank Account > Investor Servicing'] );
    }

    public function dst() {
        return view( 'subdomain.investor-servicing.dst.index', [ 'title' => 'Reports > Investor Servicing'] );
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