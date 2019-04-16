<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller {

    use \Illuminate\Foundation\Auth\AuthenticatesUsers;
    protected $redirectTo;

    public function getLogin(Request $request) {
        return view('session.login');
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
        User::create([
            'first_name'    => $first_name,
            'last_name'     => $last_name,
            'email'         => $email,
            'password'      => Hash::make($password),
            'site_id'       => $site_id,
            'profile_image' => '/img/default-profile.png',
        ]);

        $this->redirectTo = '/onboard';
        return $this->login($request);
    }
}