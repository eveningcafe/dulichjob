<?php      
	foreach($search as $key => $row)
	{
        $ten_cty[$key] = $row->ten;
        $tour_id[$key] = $row->tour_id;
        $cty_id[$key] = $row->congty_id;
        $dia_diem[$key] = $row->dia_diem;
        $yeu_cau[$key] = $row->yeu_cau;
        $thu_lao[$key] = $row->thu_lao;
        $so_luong_duongdv[$key] = $row->so_luong_huongdv;
        $nguoi_lien_he[$key] = $row->nguoi_lien_he;
        $email_lien_he[$key] = $row->email_lien_he;
        $han_dang_ky[$key] = $row->han_dang_ky;
        $thoi_gian_bat_dau[$key] = $row->thoi_gian_bat_dau;
        $thoi_gian_ket_thuc[$key] = $row->thoi_gian_ket_thuc;
		$lich_trinh[$key] = $row->lich_trinh;
		$tinh_trang[$key] = $row->tinh_trang;
		$mo_ta[$key] = $row->mo_ta;
	}
	$count = $search->count();
?>

@extends('layouts.app')

@section('content')

<div style=" margin-top: 99px;border-style: ridge;">
<!-- noi dung -->
<div class="container">
    <div class="row">
    	<div class="panel-heading"><h1>Search Result</h1></div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2"> 
            
            <div class="panel-body">

            	<?php for($i=0;$i<$count;$i++){?>
                    <div>
            		<a class="col-md-4" href="/Cty/<?php echo $cty_id[$i]; ?>">Tên công ty: <?php echo $ten_cty[$i]; ?></a>           		
            	</div>
            	<div>
            		<a class="col-md-4" href="/Tour/<?php echo $tour_id[$i]; ?>">Địa điểm: <?php echo $dia_diem[$i]; ?></a>           		
            	</div>
                <div>
                    <label class=" col-md-4 control-label">Lịch trình: <?php echo $lich_trinh[$i];?> </label>  
                    <label class=" col-md-4 control-label">Tình trạng: <?php echo $tinh_trang[$i];?> </label>
                    <label class=" col-md-4 control-label">Yêu cầu: <?php echo $yeu_cau[$i];?> </label>  
                    <label class=" col-md-4 control-label">Thù lao: <?php echo $thu_lao[$i];?> </label>  
                    <label class=" col-md-4 control-label">Số lượng hướng dẫn viên: <?php echo $so_luong_duongdv[$i];?> </label>  
                    <label class=" col-md-4 control-label">Người liên hệ: <?php echo $nguoi_lien_he[$i];?> </label>  
                    <label class=" col-md-4 control-label">Email liên hệ: <?php echo $email_lien_he[$i];?> </label>
                    <label class=" col-md-4 control-label">Thời gian bắt đầu: <?php echo $thoi_gian_bat_dau[$i];?> </label> 
                    <label class=" col-md-4 control-label">Thời gian kết thúc: <?php echo $thoi_gian_ket_thuc[$i];?> </label>  
                    <label class=" col-md-4 control-label">Hạn đăng ký: <?php echo $han_dang_ky[$i];?> </label>                         
                </div>

                <div>
                    <label class=" col-md-4 control-label">Mô tả: <?php echo $mo_ta[$i];?> </label> 
                </div>
                <div>
                    <br>
                </div>
            	<?php } ?>
            </div>
        </div>
    </div>
</div>	
@endsection
