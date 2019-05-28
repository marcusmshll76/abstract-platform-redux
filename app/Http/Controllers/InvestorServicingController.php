<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class InvestorServicingController extends Controller {
    public function k1() {
        return view( 'investor-servicing.investor-K-1.index', [ 'title' => 'K1 > Investor Servicing'] );
    }

    public function choose(Request $request) {
        return view( 'investor-servicing.choose.investment', [ 'title' => 'Choose Investment > Investor Servicing'] );
    }

    public function captable() {
        return view( 'investor-servicing.cap.table', [ 'title' => 'Cap Table Management > Investor Servicing'] );
    }

    public function distributions() {
        return view( 'investor-servicing.distributions.index', [ 'title' => 'Distributions > Investor Servicing'] );
    }

    public function reports() {
        return view( 'investor-servicing.reports.index', [ 'title' => 'Reports > Investor Servicing'] );
    }
    

    /* public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth.details');
    } */

    /* private function get_nav( $current ) {
        $nav = array(
            'header'    => 'Investor Servicing',
            'links'     => array(
                array(
                    'href'  => '#',
                    'text'  => 'Choose an Investment',
                    'current' => false,
                ),
                array(
                    'href'  => '#',
                    'text'  => 'Cap Table Management',
                    'current' => false,
                ),
                array(
                    'href'  => '#',
                    'text'  => 'Distributions',
                    'current' => false,
                ),
                array(
                    'href'  => '/investor-servicing/k1',
                    'text'  => 'Investor K-1s',
                    'current' => false,
                ),
                array(
                    'href'  => '#',
                    'text'  => 'Reports',
                    'current' => false,
                )
            )
        );

        foreach($nav['links'] as &$l) {
            if( $l['href'] == $current ) {
                $l['current'] = true;
            }
        }

        return $nav;
    } */
}