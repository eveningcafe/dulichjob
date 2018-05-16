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
		$tour_id = $_GET['tour_id'];

		$dt = \DB::table('huongdv_tours')
			->where([['tour_id', '=', $tour_id], ['tinh_trang_dk', '=', 'accept']])
			->get();
		if ($dt->count() == 0) //chưa accept ai cả thì được sửa
		{
			$data = \DB::table('tour_du_lichs')
				->join('congty_tours', function ($join) {
					$join->on('tour_du_lichs.id', '=', 'congty_tours.tour_id');
				})->where([['tour_du_lichs.id', '=', $tour_id], ['tour_du_lichs.tinh_trang', '<>', 'đã hủy']])
				->get();
			return view('EditTour', ['data' => $data]);
		} else {
			echo '<script type="text/javascript">alert("You can\'t edit a tour in  which some tour guide chosen" );</script>';
			return $this->madeTour();
		}

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

			$id = \DB::table("cong_tys")
				->where('user_id', 'LIKE', \Auth::user()->id)->value('id');
			$tour_id = $_POST['tour_id'];
			$rs1 = \DB::table('tour_du_lichs')
				->where('id', '=', $tour_id)
				->update(['dia_diem' => $dichDen, 'lich_trinh' => $lichTrinh, 'so_luong_khach' => $luongKhach, 'tinh_trang' => "đang xếp lịch"]);
			$rs2 = \DB::table('congty_tours')
				->where([['tour_id', '=', $tour_id], ['congty_id', '=', $id]])
				->update(['yeu_cau' => $yeuCau, 'thu_lao' => $thuLao, 'so_luong_huongdv' => $slgHDV,
					'nguoi_lien_he' => $ngLienHe, 'email_lien_he' => $emailLienHe, 'thoi_gian_bat_dau' => $tgBatDau,
					'thoi_gian_ket_thuc' => $tgKetThuc, 'han_dang_ky' => $hanDK, 'mo_ta' => $moTa]);

			if (($rs1 == 0) && ($rs2 == 0)) {
				echo '<script type="text/javascript">alert("No change!" );</script>';
			} else {
				$hdvdk = \DB::table('huongdv_tours')->where(['tour_id' => $tour_id])
					->get();
				foreach ($hdvdk as $hdv) {
					//Thêm vào bảng thông báo của hdv
					\DB::table('thong_bao_hdvs')->insert(['tour_id' => $tour_id, 'hdv_id' => $hdv->huongdv_id, 'noi_dung_tb' => "Thay đổi"]);
				}

				//Xóa trong bảng hdv-tour
				\DB::table('huongdv_tours')->where(['tour_id' => $tour_id])
					->delete();
				echo '<script type="text/javascript">alert("Save Tour successfull" );</script>';
			}
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
		//$id = \Auth::user()->id;
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

		$tour_id = $_GET['tour_id'];
		$dt = \DB::table('huongdv_tours')
			->where([['tour_id', '=', $tour_id], ['tinh_trang_dk', '=', 'accept']])
			->get();
		if ($dt->count() == 0) //chưa accept ai cả thì được hủy
		{
			\DB::table('tour_du_lichs')
				->where('id', '=', $tour_id)
				->update(['tinh_trang' => 'đã hủy']);

			$hdvdk = \DB::table('huongdv_tours')->where(['tour_id' => $tour_id])
				->get();
			foreach ($hdvdk as $hdv) {
				\DB::table('thong_bao_hdvs')->insert(['tour_id' => $tour_id, 'hdv_id' => $hdv->huongdv_id, 'noi_dung_tb' => "Hủy"]);
			}
			\DB::table('huongdv_tours')->where(['tour_id' => $tour_id])
				->delete();

			$data = \DB::table('tour_du_lichs')
				->join('congty_tours', function ($join) {
					$join->on('tour_du_lichs.id', '=', 'congty_tours.tour_id');
				})
				->where('tour_du_lichs.tinh_trang', '<>', 'đã hủy')
				->get();
			return view('TourDaTao', ['data' => $data]);
		} else {
			echo '<script type="text/javascript">alert("You can\'t cancle a tour in  which some tour guide chosen" );</script>';
			return $this->madeTour();
		}

	}

	public function getTour() {
		$newTours = NewTours::where([['tinh_trang', '=', 'đang xếp lịch'], ['tour_du_lichs.tinh_trang', '<>', 'đã hủy']])
			->latest($column = 'created_at')
			->take(10)
			->get();
		return view('ViewTours', compact('newTours'));

	}

	public function getAppliedTour() {
		$hdv_id = \DB::table("huong_dan_viens")
			->where('user_id', 'LIKE', \Auth::user()->id)->value('id');
		$data = HDVTour::join('congty_tours', 'huongdv_tours.tour_id', '=', 'congty_tours.tour_id')
			->join('cong_tys', 'congty_tours.congty_id', '=', 'cong_tys.id')
			->join('tour_du_lichs', 'congty_tours.tour_id', '=', 'tour_du_lichs.id')
			->where('huongdv_tours.huongdv_id', '=', $hdv_id)
			->get();
		return view('TourDaDK', ['data' => $data]);

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
		$joins = \DB::table("huong_dan_viens")->join('huongdv_tours', function ($join) {
			$join->on('huong_dan_viens.id', '=', 'huongdv_tours.huongdv_id');
		})->where([['huongdv_tours.tour_id', '=', $tour_id], ['huongdv_tours.tinh_trang_dk', '=', 'accept']])
			->get();
		$danhsachIDHDV = array();
		foreach ($joins as $join) {
			array_push($danhsachIDHDV, $join->huongdv_id);
		}
		$now_hdv_id = \DB::table("huong_dan_viens")
			->where('user_id', 'LIKE', \Auth::user()->id)->value('id');
		if (in_array($now_hdv_id, $danhsachIDHDV)) {
			$data->first()->inTour = 'yes';
		} else {
			$data->first()->inTour = 'no';
		}
		$danhsachHDV = \DB::table("huong_dan_viens")->whereIn('id', $danhsachIDHDV)->get();
		$data->first()->danhsachHDV = $danhsachHDV;

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
				HDVTour::insert(['tour_id' => $tour_id, 'huongdv_id' => $hdv_id, 'ngay_dang_ky' => $current_time, 'tinh_trang_dk' => "wait"]);

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

		$tour_id = $_GET['tour_id'];

		$hdv_id = \DB::table("huong_dan_viens")
			->where('user_id', 'LIKE', \Auth::user()->id)->value('id');

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
		$id = \DB::table("cong_tys")
			->where('user_id', 'LIKE', \Auth::user()->id)->value('id');
		$data = NewTours::
			join('congty_tours', function ($join) {
			$join->on('tour_du_lichs.id', '=', 'congty_tours.tour_id');
		})
			->join('huongdv_tours', function ($join) {
				$join->on('tour_du_lichs.id', '=', 'huongdv_tours.tour_id');
			})
			->join('huong_dan_viens', function ($join) {
				$join->on('huongdv_tours.huongdv_id', '=', 'huong_dan_viens.id');
			})
			->where([['congty_tours.congty_id', '=', $id], ['tour_du_lichs.tinh_trang', '<>', 'đã hủy']])
			->get();
		return view('DuyetThuDK', compact('data'));

	}

	public function updateHDVTour() {

		$tour_id = $_GET['tour_id'];
		$tinh_trang = $_GET['tt'];
		$hdv_id = $_GET['HDVid'];
		$id = \DB::table("cong_tys")
			->where('user_id', 'LIKE', \Auth::user()->id)->value('id'); //conty_id
		HDVTour::where(['tour_id' => $tour_id, 'huongdv_id' => $hdv_id])
			->update(['tinh_trang_dk' => $tinh_trang]);
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
	public function viewDetail($id) {
		$user_id = \Auth::user()->id;
		$cty_id = \DB::table('cong_tys')->where('user_id', '=', $user_id)->value('id');
		$tour = \DB::table('congty_tours')->leftjoin('tour_du_lichs', 'congty_tours.tour_id', '=', 'tour_du_lichs.id')->where('congty_id', '=', $cty_id)->where('congty_tours.id', '=', $id)->get();
		return view('TourDetail', ['tour' => $tour]);
	}
	public function getTourtoInvite($id) {
		$user_id = \Auth::user()->id;
		$cty_id = \DB::table('cong_tys')->where('user_id', '=', $user_id)->value('id');
		$tour = \DB::table('congty_tours')->leftjoin('tour_du_lichs', 'congty_tours.tour_id', '=', 'tour_du_lichs.id')->where('congty_id', '=', $cty_id)->where('tour_du_lichs.tinh_trang', 'LIKE', 'đang xếp lịch')->get();
		return view('TourInvite', ['tour' => $tour, 'hdv_id' => $id, 'cty_id' => $cty_id]);
	}
	public function sendInvitation() {
		$tour_id = $_POST['tour_id'];
		$cty_id = $_POST['cty_id'];
		$hdv_id = $_POST['hdv_id'];
		$ghi_chu = $_POST['ghi_chu'];
		\DB::table('hdv_invitation')->insert(['congty_id' => $cty_id, 'tour_id' => $tour_id, 'huongdv_id' => $hdv_id, 'ghi_chu' => $ghi_chu, 'trang_thai' => 'not_see']);
		echo '<script type="text/javascript">  alert("Đã gửi lời mời");</script>';
		echo '<script type="text/javascript">  window.location = "/InviteHDV/' . $hdv_id . '";</script>';

	}

	public function getThongBaoHDV() {
		$id = \DB::table("huong_dan_viens")
			->where('user_id', 'LIKE', \Auth::user()->id)->value('id');
		$data = \DB::table('thong_bao_hdvs')
			->where('hdv_id', '=', $id)
			->join('tour_du_lichs', function ($join) {
				$join->on('thong_bao_hdvs.tour_id', '=', 'tour_du_lichs.id');
			})
			->latest($column = 'thoi_gian')
			->get();
		return view('ThongBaoHDV', compact('data'));

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
