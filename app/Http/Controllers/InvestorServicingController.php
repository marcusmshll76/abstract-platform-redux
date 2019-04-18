<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class InvestorServicingController extends Controller {
    public function k1() {
        return view( 'investor-servicing.k1' );
    }

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth.details');
    }
}