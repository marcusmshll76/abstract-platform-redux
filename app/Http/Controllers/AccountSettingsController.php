<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class AccountSettingsController extends Controller {
    public function verification(Request $request) {
        return view( 'account-settings.verify', [ 'title' => 'Account Settings -> Account Verification'] )->with('data', $request->session()->get('account-settings'));
    }

    public function bio(Request $request) {

        $this->validate($request, [
            'company_name' => 'required',
            'company_website' => 'required',
            'first_name' => 'required',
            'work_phone' => 'required',
            'company_address' => 'required',
            'company_address_2' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'email' => 'required|email',
            'job_title' => 'required',
            'tin' => 'required',
            'country' => 'required'
        ]);
        
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

    public function wallets() {
        return view( 'account-settings.wallets', [ 'title' => 'Account Settings -> Digital Custodial Wallets' ] );
    }

    public function privacy() {
        return view( 'account-settings.privacy', [ 'title' => 'Account Settings -> Privacy & Data Storage' ] );
    }

    public function updatePrivacy(Request $request) {
        $edc = (bool) $request->input( 'edc', true );
        $signee_first = $request->input( 'signee_first_name' );
        $signee_last = $request->input( 'signee_last_name' );
        $signee_email = $request->input( 'signee_email' );

        DB::table( 'users' )
            ->where( 'id', $request->user->id )
            ->update( [
                'electronic_document_consent'   => $edc,
                'signee_first_name'             => $signee_first,
                'signee_last_name'              => $signee_last,
                'signee_email'                  => $signee_email
            ] );
        
        $updated_user = DB::table( 'users' )->where( 'id', $request->user->id )->distinct()->get();
        \Illuminate\Support\Facades\View::share( 'user', $updated_user[0] );
        
        return view( 'account-settings.privacy', [ 'title' => 'Account Settings -> Privacy & Data Storage', 'updated' => true ] );
    }

    public function passwordAnd2FA() {
        return view( 'account-settings.password', [ 'title' => 'Account Settings -> Password & 2FA' ] );
    }

    public  function updatePassword(Request $request) {
        $current_password = $request->input( 'current_password' );
        $new_password = $request->input( 'new_password' );

        if( Auth::attempt( [ 'email' => $request->user->email, 'password' => $current_password ] ) ) {
            $new_password = Hash::make( $new_password );
            DB::table( 'users' )
                ->where( 'id', $request->user->id )
                ->update( [ 'password' => $new_password ] );
            
            return view( 'account-settings.password', [ 'title' => 'Account Settings -> Password & 2FA', 'success' => true ] );   
        } else {
            return view( 'account-settings.password', [ 'title' => 'Account Settings -> Password & 2FA', 'error' => true ] );
        }
    }

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth.details');
    }
}