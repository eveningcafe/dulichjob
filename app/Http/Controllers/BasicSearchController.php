<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class BasicSearchController extends Controller {

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
}
