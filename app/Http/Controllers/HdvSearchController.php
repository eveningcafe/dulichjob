<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HdvSearchController extends Controller
{
	public function __construct() //Redirect if not login
	{
		$this->middleware('auth');
	}

	public function hdvGetFormSearch()
	{
		return view('HdvSearch');
	}

	public function advancedSearch()
	{
        $name_cty = $_GET['name_cty'];
        $name_cty = "%".$name_cty."%";
		$dia_diem = $_GET['dia_diem'];
		$dia_diem = "%".$dia_diem."%";
		$lich_trinh = $_GET['lich_trinh'];
		$lich_trinh = "%".$lich_trinh."%";
		$tinh_trang = $_GET['tinh_trang'];
		$tinh_trang = "%".$tinh_trang."%";

        $search = \DB::table('congty_tours')
        ->join('tour_du_lichs', 'congty_tours.tour_id', '=', 'tour_du_lichs.id')
        ->join('cong_tys', 'congty_tours.congty_id', '=', 'cong_tys.id')
        ->where('ten', 'LIKE', $name_cty)
        ->where('dia_diem', 'LIKE', $dia_diem)
        ->where('lich_trinh', 'LIKE', $lich_trinh)->where('tinh_trang', 'LIKE', $tinh_trang)
        ->paginate(10);
		$search->appends(Input::except('page'))->render();
		return view('HdvResult', ['search' => $search]);
	}
	public function notUser()
	{
		return redirect('login');
    }
    
    public function getTour($id)
	{
		$id = \Auth::user()->id;
		$tour = \DB::table('tour_du_lichs')->where('id', '=', $id)->get();
		return view('ViewTour', ['tour' => $tour]);
    }
    
    public function getCty($id)
	{
		$vp = \DB::table('van_phongs')->where('congty_id', '=', $id)->get();
		$cty = \DB::table('cong_tys')->where('id', '=', $id)->get();
		return view('ViewInformCty', ['cty' => $cty, 'vp' => $vp]);
    }

}
