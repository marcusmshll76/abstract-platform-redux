<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class InvestorServicingController extends Controller {
    public function k1() {
        return view( 'investor-servicing.k1', [ 'nav' => $this->get_nav('/investor-servicing/k1') ] );
    }

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth.details');
    }

    private function get_nav( $current ) {
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
    }
}