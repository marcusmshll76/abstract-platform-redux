<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\AccountVerificiation;

class AccountSettingsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth.details');
    } 
    
    /*******************
     * ******* Account Verification
     **************/
    public function verification(Request $request) {
        return view( 'account-settings.verify', [ 'title' => 'Account Settings -> Account Verification'] )->with('data', $request->session()->get('account-settings'));
    }

    public function createVerification(Request $request) {
        $session_data = session( 'account-settings', array() );
        $session_data = array_merge( $session_data, $_POST );
        session( [ 'account-settings' => $session_data ] );

        return redirect('/account-settings/verification/bio');
    }

    public function bio(Request $request) {
        return view( 'account-settings.bio', [ 'title' => 'Account Settings -> Sponsor Bio'] )->with('data', $request->session()->get('account-settings'));
    }

    public function createBio(Request $request) {
        $session_data = session( 'account-settings', array() );
        $session_data = array_merge( $session_data, $_POST );
        session( [ 'account-settings' => $session_data ] );

        return redirect('/account-settings/verification/principles');
    }

    public function principles(Request $request) {
        return view( 'account-settings.principles', [ 'title' => 'Account Settings -> Meet The Principles'] )->with('data', $request->session()->get('account-settings'));
    }

    public function references(Request $request) {
        return view( 'account-settings.references', [ 'title' => 'Account Settings -> Professional References' ] )->with('data', $request->session()->get('account-settings'));
    }

    public function createReferences(Request $request) {
        
        $session_data = session( 'account-settings', array() );
        $session_data = array_merge( $session_data, $_POST );
        session( [ 'account-settings' => $session_data ] );

        return redirect('/account-settings/verification/diligence');
    }

    public function diligence(Request $request) {
        return view( 'account-settings.diligence', [ 'title' => 'Account Settings -> Sponsor Diligence' ] )->with('data', $request->session()->get('account-settings'));
    }

    public function createDiligence(Request $request) {
        $session_data = session( 'account-settings', array() );
        $session_data = array_merge( $session_data, $_POST );
        session( [ 'account-settings' => $session_data ] );
        return redirect('/account-settings/verification/preview');
    }

    public function getPrinciples(Request $request) {
        $userid = Auth::id();
        $principles = DB::table('account_verification')
            ->where('userid', $userid)
            ->select('principles')
            ->first();
        if ($principles) {
            return response()->json([
                'message' => 'Account Settings Principles',
                'response' => $principles->principles,
                'status' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Failed',
                'status' => 490
            ]);
        }
    }

    // Save Data into a session
    public function saveData (Request $request, $e) {
        
        if ($e != 'principles' && $e != 'meetSponsors') {
            $session_data = session( 'account-settings', array() );
            $session_data = array_merge( $session_data, $_POST );
            session( [ 'account-settings' => $session_data ] );
        } else {
            if ($e === 'keyPoints') {
                $request->session()->put('account-settings.key-points', $request->get('key-point'));
            } else if ($e === 'principles') {
                $request->session()->put('account-settings.principles', $request->get('principles'));
            }
        }
       

        switch ($e) {
            case "details":
                return redirect('/account-settings/step-1/highlights');
                break;
            case "highlights":
                return redirect('/account-settings/step-2/ownership');
                break;
            case "ownership":
                return redirect('/account-settings/step-3/diligence');
                break;
            case "keyPoints":
                return ('/account-settings/step-5/capital-stack');
                break;
            case "capitalStack":
                return redirect('/account-settings/step-6/meet-sponsors');
                break;
            case "principles":
                return ('/account-settings/verification/references');
                break;
            default:
                return redirect('/account-settings/step-1/choose');
        }
    }

    /*******************
     * ******* Preview
     **************/
    public function preview(Request $request) {
        return view( 'account-settings.preview', [ 'title' => 'Account Settings -> Preview' ] )->with('data', $request->session()->get('account-settings'));
    }


    public function submitPreview(Request $request) {

        $session_data = session( 'account-settings', array() );
        $session_data = array_merge( $session_data, $_POST );
        session( [ 'account-settings' => $session_data ] );
        
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
            'country' => 'required',
            'bio' => 'required',
            'portfolio_activity_amount' => 'required',
            'assets_under_management' => 'required',
            'square_feet_managed' => 'required',
            'reference_type_1' => 'required',
            'reference_name_1' => 'required',
            'reference_phone_1' => 'required',
            'reference_email_1' => 'required|email',
            'reference_type_2' => 'required',
            'reference_name_2' => 'required',
            'reference_phone_2' => 'required',
            'reference_email_2' => 'required|email',
            'reference_type_3' => 'required',
            'reference_name_3' => 'required',
            'reference_phone_3' => 'required',
            'reference_email_3' => 'required|email',
            'reference_type_4' => 'required',
            'reference_name_4' => 'required',
            'reference_phone_4' => 'required',
            'reference_email_4' => 'required|email'
        ]);
        
        if (!empty($request->session()->get('account-settings.principles'))) {
            $principles = $request->session()->get('account-settings.principles');
        }

        if (!empty(json_encode($principles))) {
            $userid = Auth::id();
            $payload = array(
                'userid' => $userid,
                'company_name' => $request->get('company_name'),
                'company_website' => $request->get('company_website'),
                'first_name' => $request->get('first_name'),
                'work_phone' => $request->get('work_phone'),
                'company_address' => $request->get('company_address'),
                'company_address_2' => $request->get('company_address_2'),
                'last_name' => $request->get('last_name'),
                'mobile' => $request->get('mobile'),
                'city' => $request->get('city'),
                'state' => $request->get('state'),
                'zip' => $request->get('zip'),
                'email' => $request->get('email'),
                'job_title' => $request->get('job_title'),
                'tin' => $request->get('tin'),
                'country' => $request->get('country'),
                'bio' => $request->get('bio'),
                'portfolio_activity_amount' => $request->get('portfolio_activity_amount'),
                'assets_under_management' => $request->get('assets_under_management'),
                'square_feet_managed' => $request->get('square_feet_managed'),
                'principles' => $principles,
                'reference_type_1' => $request->get('reference_type_1'),
                'reference_name_1' => $request->get('reference_name_1'),
                'reference_phone_1' => $request->get('reference_phone_1'),
                'reference_email_1' => $request->get('reference_email_1'),
                'reference_type_2' => $request->get('reference_type_2'),
                'reference_name_2' => $request->get('reference_name_2'),
                'reference_phone_2' => $request->get('reference_phone_2'),
                'reference_email_2' => $request->get('reference_email_2'),
                'reference_type_3' => $request->get('reference_type_3'),
                'reference_name_3' => $request->get('reference_name_3'),
                'reference_phone_3' => $request->get('reference_phone_3'),
                'reference_email_3' => $request->get('reference_email_3'),
                'reference_type_4' => $request->get('reference_type_4'),
                'reference_name_4' => $request->get('reference_name_4'),
                'reference_phone_4' => $request->get('reference_phone_4'),
                'reference_email_4' => $request->get('reference_email_4'),
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            );

            DB::table('account_verification')->insert($payload);
            return view( 'account-settings.preview', [ 'title' => 'Account Settings -> Preview', 'success' => true ] );
        } else {
            return view( 'account-settings.preview', [ 'title' => 'Account Settings -> Preview', 'error' => true ] );
        }
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
}