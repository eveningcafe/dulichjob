<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CtySearchController extends Controller {
	public function __construct() //Redirect if not login
	{
		$this->middleware('auth');
	}

	public function basicSearch() {
		$user_id = \Auth::user()->id;
		$cty_id = \DB::table('cong_tys')->where('user_id', '=', $user_id)->value('id');

		if (isset($_GET['name'])) {
			$name = $_GET['name'];
		} else {
			$name = "";
		}
		$name = "%" . $name . "%";
		if (isset($_GET['city'])) {
			$city = $_GET['city'];
		} else {
			$city = "";
		}
		$city = "%" . $city . "%";
		$hdv = \DB::table('huong_dan_viens')->where('ten', 'LIKE', $name)->paginate(10);
		$hdv->appends(Input::except('page'))->render();
		$tour = \DB::table('congty_tours')->leftjoin('tour_du_lichs', 'congty_tours.tour_id', '=', 'tour_du_lichs.id')->where('congty_id', '=', $cty_id)->where('tour_du_lichs.dia_diem', 'LIKE', $city)->paginate(10);
		$tour->appends(Input::except('page'))->render();
		return view('CtySearchResult', ['hdv' => $hdv, 'tour' => $tour]);
	}

	public function getSearchTourForm() {
		return view('CtyTourSearch');
	}
	public function getSearchHDVForm() {
		return view('CtyHDVSearch');
	}
	public function searchTour() {
		$user_id = \Auth::user()->id;
		$cty_id = \DB::table('cong_tys')->where('user_id', '=', $user_id)->value('id');

		if (isset($_GET['dia_diem'])) {
			$dia_diem = $_GET['dia_diem'];
		} else {
			$dia_diem = "";
		}
		$dia_diem = "%" . $dia_diem . "%";
		if (isset($_GET['lich_trinh'])) {
			$lich_trinh = $_GET['lich_trinh'];
		} else {
			$lich_trinh = "";
		}
		$lich_trinh = "%" . $lich_trinh . "%";
		if (isset($_GET['tinh_trang'])) {
			$tinh_trang = $_GET['tinh_trang'];
		} else {
			$tinh_trang = "";
		}
		$tinh_trang = "%" . $tinh_trang . "%";
		$date1 = $_GET['date1'];
		$date2 = $_GET['date2'];
		$date3 = $_GET['date3'];
		$date4 = $_GET['date4'];

		$tour = \DB::table('congty_tours')->leftjoin('tour_du_lichs', 'congty_tours.tour_id', '=', 'tour_du_lichs.id')->where('congty_id', '=', $cty_id)->where('dia_diem', 'LIKE', $dia_diem)->where('lich_trinh', 'LIKE', $lich_trinh)->where('tinh_trang', 'LIKE', $tinh_trang)->where('thoi_gian_bat_dau', '>=', $date1)->where('thoi_gian_bat_dau', '<=', $date2)->where('thoi_gian_ket_thuc', '>=', $date3)->where('thoi_gian_ket_thuc', '<=', $date4)->paginate(10);
		$tour->appends(Input::except('page'))->render();
		return view('CtySearchResultTour', ['tour' => $tour]);

	}

	public function searchHDV() {
		if (isset($_GET['ten'])) {
			$ten = $_GET['ten'];
		} else {
			$ten = "";
		}
		$ten = "%" . $ten . "%";
		if (isset($_GET['gioi_tinh'])) {
			$gioi_tinh = $_GET['gioi_tinh'];
		} else {
			$gioi_tinh = "";
		}
		$gioi_tinh = "%" . $gioi_tinh . "%";
		if (isset($_GET['noi_lam_viec'])) {
			$noi_lam_viec = $_GET['noi_lam_viec'];
		} else {
			$noi_lam_viec = "";
		}
		$noi_lam_viec = "%" . $noi_lam_viec . "%";
		if (isset($_GET['ngoai_ngu'])) {
			$ngoai_ngu = $_GET['ngoai_ngu'];
		} else {
			$ngoai_ngu = "";
		}
		$ngoai_ngu = "%" . $ngoai_ngu . "%";

		$hdv = \DB::table('huong_dan_viens')->where('ten', 'LIKE', $ten)->where('gioi_tinh', 'LIKE', $gioi_tinh)->where('noi_lam_viec', 'LIKE', $noi_lam_viec)->where('ngoai_ngu', 'LIKE', $ngoai_ngu)->paginate(10);
		$hdv->appends(Input::except('page'))->render();

		return view('CtySearchResultHDV', ['hdv' => $hdv]);
	}
	public function notUser() {
		return redirect('login');
	}

}
