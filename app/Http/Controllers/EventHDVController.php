<?php

namespace App\Http\Controllers;
use App\HDVTour;
use Auth;
use Illuminate\Support\Facades\Redirect;

class EventHDVController extends Controller {
	public function showEvent() {
		$hdv_id = \DB::table("huong_dan_viens")
			->where('user_id', 'LIKE', \Auth::user()->id)->value('id');

		$tourResults = HDVTour::where([['tinh_trang_dk', '<>', 'wait'], ['huongdv_id', '=', $hdv_id]])->get();
		// ['event_to_hdv', '=', 'cho tin']

		$tourInvites = \DB::table("hdv_invitation")->where([['huongdv_id', '=', $hdv_id]])->get();

		// ['trang_thai', '=', 'not_see']
		foreach ($tourInvites as $tourInvite) {
			# code...
			$tourInvite->tenCty = \DB::table("cong_tys")->where('id', '=', $tourInvite->congty_id)->first()->ten;
			$tourInvite->tenTour = \DB::table("tour_du_lichs")->where('id', '=', $tourInvite->tour_id)->first()->dia_diem;
		}

		foreach ($tourResults as $tourResult) {
			# code...
			$tourResult->tenTour = \DB::table("tour_du_lichs")->where('id', '=', $tourResult->tour_id)->first()->dia_diem;
		}
		return view('EventHDV', compact('tourResults', 'tourInvites'));
	}
	public function clickSeeResult($tour_id) {
		HDVTour::where(['tour_id' => $tour_id])
			->update(['event_to_hdv' => 'da xem']);
		$url = 'viewInforTour/' . $tour_id;
		return Redirect::to($url);
	}
	public function clickSeeInvite($tour_id) {
		\DB::table("hdv_invitation")->where(['tour_id' => $tour_id])
			->update(['trang_thai' => 'not_decide']);
		$url = 'viewInforTour/' . $tour_id;
		return Redirect::to($url);

	}

}
