<?php

namespace App\Http\Controllers;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CtyProfileController extends Controller {
	public function __construct() //Redirect if not login
	{
		$this->middleware('auth');
	}

	public function getData() {
		$id = \Auth::user()->id;

		$congty_id = \DB::table("cong_tys")
			->where('user_id', 'LIKE', \Auth::user()->id)->value('id');

		$data = \DB::table('cong_tys')->where('user_id', '=', $id)->get();
		$vp = \DB::table('van_phongs')->where('congty_id', '=', $congty_id)->get();
		return view('CtyProfile', ['data' => $data, 'vp' => $vp]);
	}

	public function updateData(Request $request) {
		if (isset($_POST['submit'])) {

			$name = $_POST['name'];
			$gioithieu = $_POST['description'];
			$link = $_POST['link'];
			$id = \Auth::user()->id;
			$data = \DB::table('cong_tys')->where('user_id', '=', $id)->get();
			$vp = \DB::table('van_phongs')->where('congty_id', '=', $id)->get();
			if (isset($_POST['address']) == false) {
				$count = 0;
			} else {
				$count = count($_POST['address']);
			}
			for ($i = 0; $i < $count; $i++) {
				$address[$i] = $_POST['address'][$i];
				$email[$i] = $_POST['email'][$i];
				$phone[$i] = $_POST['phone'][$i];
			}

			$file = $request->file('image');

			if ($file == null) {
				if (isset(\DB::table('cong_tys')->where([['user_id', '=', \Auth::user()->id]])->first()->avatar_url) == true) {
					$avatar_url = \DB::table('cong_tys')->where([['user_id', '=', \Auth::user()->id]])->first()->avatar_url;
				} else {
					$avatar_url = 'img/default-placeholder.png';
				}

			} else {
				$filename = str_replace(' ', '-', $file->getClientOriginalName());
				$image_name = Carbon::now()->format('YmdHs') . $filename;
				$avatar_url = 'cty_image/' . $image_name;
				$file->move('cty_image', $image_name);
			}

			if ($data->count() == 0) {
				\DB::table('cong_tys')->insert(['user_id' => $id, 'ten' => $name, 'tu_gioi_thieu' => $gioithieu, 'website_url' => $link, 'avatar_url' => $avatar_url]);

			} else {
				\DB::table('cong_tys')->where('user_id', '=', $id)->update(['ten' => $name, 'tu_gioi_thieu' => $gioithieu, 'website_url' => $link, 'avatar_url' => $avatar_url]);
			}

			$id_cty = \DB::table("cong_tys")
				->where('user_id', 'LIKE', \Auth::user()->id)->value('id');
			\DB::table('van_phongs')->where('congty_id', '=', $id_cty)->delete();
			for ($i = 0; $i < $count; $i++) {
				\DB::table('van_phongs')->insert(['congty_id' => $id_cty, 'dia_chi' => $address[$i], 'email' => $email[$i], 'so_dien_thoai' => $phone[$i]]);
			}
			echo '<script type="text/javascript">  alert("Đã cập nhật thông tin");</script>';
			echo '<script type="text/javascript">  window.location = "/CtyProfile";</script>';
		}

	}

	public function makeTour() {
		return view('TaoTour');
	}

	public function getCty($cty_id) {
		$cty = \DB::table('cong_tys')->where('id', '=', $cty_id)->get();
		$vp = \DB::table('van_phongs')->where('congty_id', '=', $cty_id)->get();
		return view('ViewInformCty', ['cty' => $cty, 'vp' => $vp]);
	}
}
