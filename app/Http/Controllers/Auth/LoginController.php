<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Login Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles authenticating users for the application and
		    | redirecting them to your home screen. The controller uses a trait
		    | to conveniently provide its functionality to your applications.
		    |
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest')->except('logout');
	}
	// public function username() {
	// 	return 'user_name';
	// }
	public function logout(Request $request) {
		Auth::logout();
		return redirect('/login');
	}

	public function authenticated(Request $request, $user) {
		if ($user->type == 'hdv') {
			return redirect()->intended('/HdvProfile');
		} else if ($user->type == 'cty') {
			return redirect()->intended('/CtyProfile');
		}
	}
}
