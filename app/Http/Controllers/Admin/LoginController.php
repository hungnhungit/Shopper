<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class LoginController extends Controller
{


	public function __construct(){
		$this->middleware('guest')->except('logout');
	}

	use AuthenticatesUsers;


	protected $redirectTo = '/admin';

	/**
	 * Shows login
	 * @return view
	 */

    public function showLogin(){
    	return view('admin.login.show_login');
    }

    public function login(Request $request){

    	 $this->validateLogin($request);
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        $details = $request->only('email', 'password');
        //$details['status'] = 1;
        if ($this->guard()->attempt($details)) {
            return $this->sendLoginResponse($request);
        }
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);

    }
    public function logout(){
    	$this->guard()->logout();
    	return redirect()->route('admin.login');
    }
}
