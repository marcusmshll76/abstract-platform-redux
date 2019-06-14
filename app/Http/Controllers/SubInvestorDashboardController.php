<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubInvestorDashboardController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth.details');
    }

    public function investor() {
        return view( 'subdomain.dashboard.investor-info.index', [ 'title' => 'Investor Information > Investor Servicing'] );
    }

    public function bank() {
        return view( 'subdomain.dashboard.bank-account.index', [ 'title' => 'Bank Account > Investor Servicing'] );
    }

    public function consent() {
        return view( 'subdomain.dashboard.electronic-consent.index', [ 'title' => 'Bank Account > Investor Servicing'] );
    }

    public function password() {
        return view( 'subdomain.dashboard.password.index', [ 'title' => 'Bank Account > Investor Servicing'] );
    }

}