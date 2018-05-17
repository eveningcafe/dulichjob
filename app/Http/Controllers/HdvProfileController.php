<?php

namespace App\Http\Controllers;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HdvProfileController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	public function getData() {
		$id = \Auth::user()->id;

		$data = \DB::table('huong_dan_viens')->where('user_id', '=', $id)->get();
		if (!$data->first()) {
			return view('UpdateHdvProfile', ['data' => $data]);
		} else {
			return view('ViewHdvProfile', ['data' => $data]);
		}

	}

	public function getDataUpdate() {
		$id = \Auth::user()->id;
		$data = \DB::table('huong_dan_viens')->where('user_id', '=', $id)->get();
		return view('UpdateHdvProfile', ['data' => $data]);
	}

	public function updateData(Request $request) {
		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$sex = $_POST['sex'];
			$phone1 = $_POST['phone1'];
			$phone2 = $_POST['phone2'];
			$experience = $_POST['experience'];
			$education = $_POST['education'];
			$addresswork = $_POST['address-work'];
			$englishlevel = $_POST['english-level'];
			$certificate = $_POST['certificate'];
			$description = $_POST['description'];
			$file = $request->file('image');

			if ($file == null) {
				if (isset(\DB::table('cong_tys')->where([['user_id', '=', \Auth::user()->id]])->first()->avatar_url) == true) {
					$avatar_url = \DB::table('huong_dan_viens')->where([['user_id', '=', \Auth::user()->id]])->first()->avatar_url;
				} else {
					$avatar_url = 'img/default-placeholder.png';
				}
			} else {
				$filename = str_replace(' ', '-', $file->getClientOriginalName());
				$image_name = Carbon::now()->format('YmdHs') . $filename;
				$avatar_url = 'hdv_image/' . $image_name;
				$file->move('hdv_image', $image_name);
			}

			$id = \Auth::user()->id;
			$data = \DB::table('huong_dan_viens')->where('user_id', '=', $id)->get();
			if ($data->count() == 0) {
				\DB::table('huong_dan_viens')->insert(['user_id' => $id, 'ten' => $name, 'gioi_tinh' => $sex,
					'so_dien_thoai_1' => $phone1, 'so_dien_thoai_2' => $phone2, 'kinh_nghiem' => $experience,
					'hoc_van' => $education, 'noi_lam_viec' => $addresswork, 'ngoai_ngu' => $englishlevel,
					'chung_chi' => $certificate, 'tu_gioi_thieu' => $description, 'avatar_url' => $avatar_url]);
			} else {
				\DB::table('huong_dan_viens')->where('user_id', '=', $id)->update(['user_id' => $id, 'ten' => $name, 'gioi_tinh' => $sex,
					'so_dien_thoai_1' => $phone1, 'so_dien_thoai_2' => $phone2, 'kinh_nghiem' => $experience,
					'hoc_van' => $education, 'noi_lam_viec' => $addresswork, 'ngoai_ngu' => $englishlevel,
					'chung_chi' => $certificate, 'tu_gioi_thieu' => $description, 'avatar_url' => $avatar_url]);
			}

			echo '<script type="text/javascript">alert("Update data successfull" );</script>';
			$id = \Auth::user()->id;
			$data = \DB::table('huong_dan_viens')->where('user_id', '=', $id)->get();
			return view('ViewHdvProfile', ['data' => $data]);
		}
	}
	public function getHDV($hdv_id) {
		$data = \DB::table('huong_dan_viens')->where('id', '=', $hdv_id)->get();
		return view('ViewHDVInfor', ['data' => $data]);
	}
}
