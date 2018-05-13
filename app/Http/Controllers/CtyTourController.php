<?php

namespace App\Http\Controllers;

class CtyTourController extends Controller {
	public function getMyTour($id) {
		$user_id = \Auth::user()->id;
		$cty_id = \DB::table('cong_tys')->where('user_id', '=', $user_id)->value('id');
		$tour = \DB::table('congty_tours')->leftjoin('tour_du_lichs', 'congty_tours.tour_id', '=', 'tour_du_lichs.id')->where('congty_id', '=', $cty_id)->where('congty_tours.id', '=', $id)->get();
		return view('Tour', ['tour' => $tour]);
	}
}
