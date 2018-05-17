<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$user = Auth::user();
		if ($user->type == 'hdv') {
			return redirect()->intended('/HdvProfile');
		} else if ($user->type == 'cty') {
			return redirect()->intended('/CtyProfile');
		}
	}
	public function suport() {
		return view('SupportMoney');
	}
}
