<?php

namespace App\Http\Controllers;

use App\HDVTour;
use App\NewTours;
use Illuminate\Http\Request;

class TourController extends Controller {
	public function insertData() {
		if (isset($_POST['submit'])) {
			$dichDen = $_POST['dichDen'];
			$luongKhach = $_POST['luongKhach'];
			$lichTrinh = $_POST['lichTrinh'];
			$yeuCau = $_POST['yeuCau'];
			$thuLao = $_POST['thuLao'];
			$slgHDV = $_POST['slgHDV'];
			$ngLienHe = $_POST['ngLienHe'];
			$emailLienHe = $_POST['emailLienHe'];
			$tgBatDau = $_POST['tgBatDau'];
			$tgKetThuc = $_POST['tgKetThuc'];
			$hanDK = $_POST['hanDK'];
			$moTa = $_POST['moTa'];

			// $id = \Auth::user()->id;
			$id = \DB::table("cong_tys")
				->where('user_id', 'LIKE', \Auth::user()->id)->value('id');
			$data = \DB::table('tour_du_lichs')->get();
			$tour_id = ($data->count()) + 1;
			\DB::table('tour_du_lichs')->insert(['id' => $tour_id, 'dia_diem' => $dichDen, 'lich_trinh' => $lichTrinh, 'so_luong_khach' => $luongKhach, 'tinh_trang' => "đang xếp lịch"]);
			\DB::table('congty_tours')->insert(['tour_id' => $tour_id, 'congty_id' => $id, 'yeu_cau' => $yeuCau, 'thu_lao' => $thuLao, 'so_luong_huongdv' => $slgHDV,
				'nguoi_lien_he' => $ngLienHe, 'email_lien_he' => $emailLienHe, 'thoi_gian_bat_dau' => $tgBatDau,
				'thoi_gian_ket_thuc' => $tgKetThuc, 'han_dang_ky' => $hanDK, 'mo_ta' => $moTa]);

			echo '<script type="text/javascript">alert("Create Tour successfull" );</script>';
			$data = \DB::table('tour_du_lichs')
				->join('congty_tours', function ($join) {
					$join->on('tour_du_lichs.id', '=', 'congty_tours.tour_id');
				})
				->where([['congty_tours.congty_id', '=', $id], ['tour_du_lichs.tinh_trang', '<>', 'đã hủy']])
				->get();
			return view('TourDaTao', ['data' => $data]);
		}

	}

	public function getDataForUpdate() {
		$tour_id = $_GET['edit'];
		$data = \DB::table('tour_du_lichs')
			->join('congty_tours', function ($join) {
				$join->on('tour_du_lichs.id', '=', 'congty_tours.tour_id');
			})->where([['tour_du_lichs.id', '=', $tour_id], ['tour_du_lichs.tinh_trang', '<>', 'đã hủy']])
			->get();
		return view('EditTour', ['data' => $data]);

	}

	public function updateData() {
		if (isset($_POST['submit'])) {
			$dichDen = $_POST['dichDen'];
			$luongKhach = $_POST['luongKhach'];
			$lichTrinh = $_POST['lichTrinh'];
			$yeuCau = $_POST['yeuCau'];
			$thuLao = $_POST['thuLao'];
			$slgHDV = $_POST['slgHDV'];
			$ngLienHe = $_POST['ngLienHe'];
			$emailLienHe = $_POST['emailLienHe'];
			$tgBatDau = $_POST['tgBatDau'];
			$tgKetThuc = $_POST['tgKetThuc'];
			$hanDK = $_POST['hanDK'];
			$moTa = $_POST['moTa'];

			$id = \Auth::user()->id;
			$tour_id = $_POST['tour_id'];
			\DB::table('tour_du_lichs')
				->where('id', '=', $tour_id)
				->update(['dia_diem' => $dichDen, 'lich_trinh' => $lichTrinh, 'so_luong_khach' => $luongKhach, 'tinh_trang' => "đang xếp lịch"]);
			\DB::table('congty_tours')
				->where([['tour_id', '=', $tour_id], ['congty_id', '=', $id]])
				->update(['yeu_cau' => $yeuCau, 'thu_lao' => $thuLao, 'so_luong_huongdv' => $slgHDV,
					'nguoi_lien_he' => $ngLienHe, 'email_lien_he' => $emailLienHe, 'thoi_gian_bat_dau' => $tgBatDau,
					'thoi_gian_ket_thuc' => $tgKetThuc, 'han_dang_ky' => $hanDK, 'mo_ta' => $moTa]);

			echo '<script type="text/javascript">alert("Save Tour successfull" );</script>';
			$data = \DB::table('tour_du_lichs')
				->join('congty_tours', function ($join) {
					$join->on('tour_du_lichs.id', '=', 'congty_tours.tour_id');
				})
				->where('tour_du_lichs.tinh_trang', '<>', 'đã hủy')
				->get();
			return view('TourDaTao', ['data' => $data]);
		}

	}

	public function madeTour() {
		// $id = \Auth::user()->id;
		$id = \DB::table("cong_tys")
			->where('user_id', 'LIKE', \Auth::user()->id)->value('id');

		$data = \DB::table('tour_du_lichs')
			->join('congty_tours', function ($join) {
				$join->on('tour_du_lichs.id', '=', 'congty_tours.tour_id');
			})
			->where([['congty_tours.congty_id', '=', $id], ['tour_du_lichs.tinh_trang', '<>', 'đã hủy']])
			->get();
		return view('TourDaTao', ['data' => $data]);

	}

	public function updateTinhTrang() {
		$id = \Auth::user()->id;
		$tour_id = $_GET['edit'];
		\DB::table('tour_du_lichs')
			->where('id', '=', $tour_id)
			->update(['tinh_trang' => 'đã hủy']);

		$data = \DB::table('tour_du_lichs')
			->join('congty_tours', function ($join) {
				$join->on('tour_du_lichs.id', '=', 'congty_tours.tour_id');
			})
			->where('tour_du_lichs.tinh_trang', '<>', 'đã hủy')
			->get();
		return view('TourDaTao', ['data' => $data]);

	}

	public function getTour() {
		$newTours = NewTours::where([['tinh_trang', '=', 'đang xếp lịch'], ['tour_du_lichs.tinh_trang', '<>', 'đã hủy']])
			->latest($column = 'created_at')
			->take(10)
			->get();
		return view('ViewTours', compact('newTours'));

	}

	public function getAppliedTour() {
		$hdv_id = \Auth::user()->id;
		$data = HDVTour::join('congty_tours', 'huongdv_tours.tour_id', '=', 'congty_tours.tour_id')
			->join('cong_tys', 'congty_tours.congty_id', '=', 'cong_tys.user_id')
			->join('tour_du_lichs', 'congty_tours.tour_id', '=', 'tour_du_lichs.id')
			->get();
		return view('TourDaDK', compact('data'));

	}

	public function getATour($tour_id) {
		$data = NewTours::
			join('congty_tours', function ($join) {
			$join->on('tour_du_lichs.id', '=', 'congty_tours.tour_id');
		})
			->join('cong_tys', function ($join) {
				$join->on('congty_tours.congty_id', '=', 'cong_tys.id');
			})
			->where([['tour_du_lichs.id', '=', $tour_id], ['tour_du_lichs.tinh_trang', '<>', 'đã hủy']])
			->get();
		return view('TourInformation', compact('data'));

	}

	public function insertHDVTour() {
		if (isset($_POST['submit'])) {
			$tour_id = $_POST['tour_id'];
			$hdv_id = \DB::table("huong_dan_viens")
				->where('user_id', 'LIKE', \Auth::user()->id)->value('id');
			$data1 = HDVTour::where([['tour_id', '=', $tour_id], ['huongdv_id', '=', $hdv_id]])->get();
			if ($data1->count() > 0) {
				echo '<script type="text/javascript">alert("Đã Đăng Ký Tour Này Trước Đó!" );</script>';
				$data = HDVTour::join('congty_tours', 'huongdv_tours.tour_id', '=', 'congty_tours.tour_id')
					->join('cong_tys', 'congty_tours.congty_id', '=', 'cong_tys.id')
					->join('tour_du_lichs', 'congty_tours.tour_id', '=', 'tour_du_lichs.id')
					->where('huongdv_tours.huongdv_id', '=', $hdv_id)
					->get();
				return view('TourDaDK', ['data' => $data]);
			} else {
				$data = HDVTour::get();
				$current_time = \Carbon\Carbon::now()->toDateTimeString();
				HDVTour::insert(['tour_id' => $tour_id, 'huongdv_id' => $hdv_id, 'ngay_dang_ky' => $current_time, 'tinh_trang' => "wait"]);

				echo '<script type="text/javascript">alert("Đăng ký thành công!" );</script>';

				$data = HDVTour::join('congty_tours', 'huongdv_tours.tour_id', '=', 'congty_tours.tour_id')
					->join('cong_tys', 'congty_tours.congty_id', '=', 'cong_tys.id')
					->join('tour_du_lichs', 'congty_tours.tour_id', '=', 'tour_du_lichs.id')
					->where('huongdv_tours.huongdv_id', '=', $hdv_id)
					->get();
				return view('TourDaDK', ['data' => $data]);
			}}

	}

	public function deleteHDVTour() {

		$tour_id = $_GET['edit'];

		$hdv_id = \Auth::user()->id;

		HDVTour::where(['tour_id' => $tour_id, 'huongdv_id' => $hdv_id])
			->delete();

		echo '<script type="text/javascript">alert("Hủy đăng ký thành công!" );</script>';
		$data = HDVTour::join('congty_tours', function ($join) {
			$join->on('huongdv_tours.tour_id', '=', 'congty_tours.tour_id');
		})
			->join('cong_tys', function ($join) {
				$join->on('congty_tours.congty_id', '=', 'cong_tys.user_id');
			})
			->join('tour_du_lichs', function ($join) {
				$join->on('congty_tours.tour_id', '=', 'tour_du_lichs.id');
			})
			->where('huongdv_tours.huongdv_id', '=', $hdv_id)
			->get();
		return view('TourDaDK', ['data' => $data]);

	}

	public function getHDVDKTour() {
		$id = $id = \DB::table("cong_tys")
			->where('user_id', 'LIKE', \Auth::user()->id)->value('id');
		$data = NewTours::
			join('congty_tours', function ($join) {
			$join->on('tour_du_lichs.id', '=', 'congty_tours.tour_id');
		})
			->join('huongdv_tours', function ($join) {
				$join->on('tour_du_lichs.id', '=', 'huongdv_tours.tour_id');
			})
			->join('huong_dan_viens', function ($join) {
				$join->on('huongdv_tours.huongdv_id', '=', 'huong_dan_viens.user_id');
			})
			->where([['congty_tours.congty_id', '=', $id], ['tour_du_lichs.tinh_trang', '<>', 'đã hủy']])
			->get();
		return view('DuyetThuDK', compact('data'));

	}

	public function updateHDVTour() {

		$tour_id = $_GET['edit'];
		$tinh_trang = $_GET['tt'];
		$hdv_id = $_GET['HDVid'];
		$id = \Auth::user()->id;
		HDVTour::where(['tour_id' => $tour_id, 'huongdv_id' => $hdv_id])
			->update(['tinh_trang' => $tinh_trang]);

		echo '<script type="text/javascript">alert("Đã trả lời đăng ký từ HDV thành công!" );</script>';
		$data = NewTours::
			join('congty_tours', function ($join) {
			$join->on('tour_du_lichs.id', '=', 'congty_tours.tour_id');
		})
			->join('huongdv_tours', function ($join) {
				$join->on('tour_du_lichs.id', '=', 'huongdv_tours.tour_id');
			})
			->join('huong_dan_viens', function ($join) {
				$join->on('huongdv_tours.huongdv_id', '=', 'huong_dan_viens.user_id');
			})
			->where([['congty_tours.congty_id', '=', $id], ['tour_du_lichs.tinh_trang', '<>', 'đã hủy']])
			->get();
		return view('DuyetThuDK', compact('data'));

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
