<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AccountSettingsController extends Controller {
    public function verification() {
        return view( 'account-settings.verify', [ 'title' => 'Account Settings -> Account Verification'] );
    }

    public function bio() {
        $session_data = session( 'account-settings', array() );
        $session_data = array_merge( $session_data, $_POST );
        session( [ 'account-settings' => $session_data ] );
        return view( 'account-settings.bio', [ 'title' => 'Account Settings -> Sponsor Bio'] );
    }

    public function principles() {
        $session_data = session( 'account-settings', array() );
        $session_data = array_merge( $session_data, $_POST );
        session( [ 'account-settings' => $session_data ] );
        return view( 'account-settings.principles', [ 'title' => 'Account Settings -> Meet The Principles'] );
    }

    public function references() {
        $session_data = session( 'account-settings', array() );
        $session_data = array_merge( $session_data, $_POST );
        session( [ 'account-settings' => $session_data ] );
        return view( 'account-settings.references', [ 'title' => 'Account Settings -> Professional References' ] );
    }

    public function diligence() {
        $session_data = session( 'account-settings', array() );
        $session_data = array_merge( $session_data, $_POST );
        session( [ 'account-settings' => $session_data ] );
        return view( 'account-settings.diligence', [ 'title' => 'Account Settings -> Sponsor Diligence' ] );
    }

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth.details');
    }
}