<?php
	foreach($tour as $key => $row)
	{
        $tour_id[$key] = $row->id;
		$dia_diem[$key] = $row->dia_diem;
		$lich_trinh[$key] = $row->lich_trinh;
		$tinh_trang[$key] = $row->tinh_trang;
	}
	$count2 = $tour->count();
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
            
            <div class="panel-heading"><h5>Thông tin tour</h5></div>
            <div class="panel-body">
            	<?php for($i=0;$i<$count2;$i++){?>
            	<div>
            		<a class="col-md-4" style="font-size: 20px" href="/viewInforTour/<?php echo $tour_id[$i]; ?>">Địa điểm: <?php echo $dia_diem[$i]; ?></a>           		
            	</div>
                <div>
                    <label class=" col-md-4 control-label">Lịch trình: <?php echo $lich_trinh[$i];?> </label>  
                    <label class=" col-md-4 control-label">Tình trạng: <?php echo $tinh_trang[$i];?> </label>           
                </div>
            	<?php } ?>
                <?php echo $tour->links(); ?>
            </div>
        </div>
    </div>
</div>	
@endsection
