<?php

namespace App\Http\Controllers;
use Auth;

class CtyProfileController extends Controller {
	public function __construct() //Redirect if not login
	{
		$this->middleware('auth');
	}

	public function getData() {
		$id = Auth::user()->id;
		$data = \DB::table('cong_tys')->where('user_id', '=', $id)->get();
		$vp = \DB::table('van_phongs')->where('congty_id', '=', $id)->get();
		return view('CtyProfile', ['data' => $data, 'vp' => $vp]);
	}

	public function updateData() {
		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$gioithieu = $_POST['description'];
			$link = $_POST['link'];
			$image = $_POST['image'];

			$id = \Auth::user()->id;
			$data = \DB::table('cong_tys')->where('user_id', '=', $id)->get();
			$vp = \DB::table('van_phongs')->where('congty_id', '=', $id)->get();
			$count = count($_POST['address']);
			for ($i = 0; $i < $count; $i++) {
				$address[$i] = $_POST['address'][$i];
				$email[$i] = $_POST['email'][$i];
				$phone[$i] = $_POST['phone'][$i];
			}

			if ($data->count() == 0) {
				\DB::table('cong_tys')->insert(['user_id' => $id, 'ten' => $name, 'tu_gioi_thieu' => $gioithieu, 'website_url' => $link, 'avatar_url' => $image]);

			} else {
				\DB::table('cong_tys')->where('user_id', '=', $id)->update(['ten' => $name, 'tu_gioi_thieu' => $gioithieu, 'website_url' => $link, 'avatar_url' => $image]);
			}

			\DB::table('van_phongs')->where('congty_id', '=', $id)->delete();
			for ($i = 0; $i < $count; $i++) {
				\DB::table('van_phongs')->insert(['congty_id' => $id, 'dia_chi' => $address[$i], 'email' => $email[$i], 'so_dien_thoai' => $phone[$i]]);
			}
			return redirect('/CtyProfile');
		}

	}
}
