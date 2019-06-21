<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller {

    use \Illuminate\Foundation\Auth\AuthenticatesUsers;
    protected $redirectTo;

    public function getLogin(Request $request) {
        return view('session.login');
    }

    public function getForget(Request $request) {
        return view('session.forget');
    }

    public function doForget(Request $request) {
        $this->validate($request, [
            'email' => 'required'
        ]);
        $email = $request->get('email');
        $user = User::where('email', '=', $email)->first();
        
        if ($user === null) {
            return view('session.forget', [ 'title' => 'Forgot Password', 'error' => true ] );
        } else {
            // @todo Send Recovery Email
            return redirect( '/reset-password' );
        }
    }

    public function getResetPassword(Request $request) {
        return view('session.reset');
    }

    public function doLogin(Request $request) {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, true)) {
            if( $request->site->id == 1 ) {
                return redirect()->intended('/sponsor/introduction');
            } else {
                return redirect()->intended('/investor-servicing/choose-investment');
            }
        } else {
            return view('session.login', [ 'error' => true ] );
        }
    }

    public function getRegister(Request $request) {
        return view('session.register');
    }

    public function doRegister(Request $request) {
        $first_name = $request->input('first');
        $last_name = $request->input('last');
        $email = $request->input('email');
        $password = $request->input('password');
        $site_id = $request->site->id;

        // @TODO validation
        $user_id = User::create([
            'first_name'    => $first_name,
            'last_name'     => $last_name,
            'email'         => $email,
            'password'      => Hash::make($password),
            'site_id'       => $site_id,
            'profile_image' => '/img/default-profile.png',
        ])->id;

        // If the user is registering on the primary site, make them a "sponsor" for the subsite
        if( $request->site->id == 1 ) {
            DB::table( 'microsite_sponsors' )->insert(
                [ 'sponsorid' => $user_id, 'siteid' => 2 ]
            );
        }

        $this->redirectTo = '/sponsor/introduction';
        return $this->login($request);
    }

    public function doLogout(Request $request) {
        Auth::logout();
        return redirect( '/' );
    }
}