<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HdvSearchController extends Controller {

	public function basicSearch() {
		if(isset($_GET['submit'])) {
			if($_GET['search'] == 'cty') {
				if(isset($_GET['name'])) {
					$ten = $_GET['name'];
				} else {
					$ten = "";
				}
			$ten = "%".$ten."%";
			$cty = \DB::table('cong_tys')->where('ten', 'LIKE', $ten)->paginate(10);
			$cty->appends(Input::except('page'))->render();

			return view('HdvSearchResultCty', ['cty' => $cty]);
			} else {
				if(isset($_GET['name'])) {
					$dia_diem = $_GET['name'];
				} else {
					$dia_diem = "";
				}
			$dia_diem = "%".$dia_diem."%";
			$tour = \DB::table('tour_du_lichs')
			->where('dia_diem', 'LIKE', $dia_diem)->paginate(10);
			$tour->appends(Input::except('page'))->render();
			return view('HdvSearchResultTour', ['tour' => $tour]);
			}
			if($_POST['search'] == 'cty') {
				if(isset($_POST['name'])) {
					$ten = $_POST['name'];
				} else {
					$ten = "";
				}
			$ten = "%".$ten."%";
			$cty = \DB::table('cong_tys')->where('ten', 'LIKE', $ten)->paginate(10);
			$cty->appends(Input::except('page'))->render();

			return view('HdvSearchResultCty', ['cty' => $cty]);
			} else {
				if(isset($_POST['name'])) {
					$dia_diem = $_POST['name'];
				} else {
					$dia_diem = "";
				}
			$dia_diem = "%".$ia_diem."%";
			$tour = \DB::table('tour_du_lichs')
			->where('dia_diem', 'LIKE', $dia_diem)->paginate(10);
			$tour->appends(Input::except('page'))->render();
			return view('HdvSearchResultTour', ['tour' => $tour]);
			}
		}
	}
	public function __construct() //Redirect if not login
	{
		$this->middleware('auth');
	}

	public function hdvGetFormSearchTour() {
		return view('HdvSearchTour');
	}

	public function hdvGetFormSearchCty() {
		return view('HdvSearchCty');
	}

	public function advancedSearch() {
		if(isset($_GET['name_cty']))
		{
			$name_cty = $_GET['name_cty'];
		}
		else
		{
			$name_cty = "";
		}
		$name_cty = "%".$name_cty."%";
		if(isset($_GET['van_phong']))
		{
			$van_phong = $_GET['van_phong'];
		}
		else
		{
			$van_phong = "";
		}
		$van_phong = "%".$van_phong."%";
		if(isset($_GET['dia_diem']))
		{
			$dia_diem = $_GET['dia_diem'];
		}
		else
		{
			$dia_diem = "";
		}
		$dia_diem = "%".$dia_diem."%";
		if(isset($_GET['lich_trinh']))
		{
			$lich_trinh = $_GET['lich_trinh'];
		}
		else
		{
			$lich_trinh = "";
		}
		$lich_trinh = "%".$lich_trinh."%";
		if(isset($_GET['tinh_trang']))
		{
			$tinh_trang = $_GET['tinh_trang'];
		}
		else
		{
			$tinh_trang = "";
		}
		$tinh_trang = "%".$tinh_trang."%";
		
		$search = \DB::table("congty_tours")
			->join('tour_du_lichs', 'congty_tours.tour_id', '=', 'tour_du_lichs.id')
			->join('cong_tys', 'congty_tours.congty_id', '=', 'cong_tys.id')
			->where('ten', 'LIKE', $name_cty)
			->where('dia_diem', 'LIKE', $dia_diem)
			->where('lich_trinh', 'LIKE', $lich_trinh)
			->where('tinh_trang', 'LIKE', $tinh_trang)
			->paginate(10);
		$search->appends(Input::except('page'))->render();
		return view('HdvResultSearch', ['search' => $search]);
	}
	public function notUser() {
		return redirect('login');
	}

}
