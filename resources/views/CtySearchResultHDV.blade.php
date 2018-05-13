<?php
	foreach($hdv as $key => $row)
	{
        $hdvid[$key] = $row->id;
		$hdvname[$key] = $row->ten;
		$gioitinh[$key] = $row->gioi_tinh;
        $kinhnghiem[$key] = $row->kinh_nghiem;
        $noilamviec[$key] = $row->noi_lam_viec;
        $ngoaingu[$key] = $row->ngoai_ngu;
	}
	$count1 = $hdv->count();
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

		    <div class="panel-heading"><h5>Hướng dẫn viên</h5></div>
            <div class="panel-body">
            	<?php for($i=0;$i<$count1;$i++){?>
            	<div>
            		<a class="col-md-4" style="font-size: 20px" href="/viewHDV/<?php echo $hdvid[$i]; ?>"><?php echo $hdvname[$i]; ?></a>
            	</div>
            	<div>
                    <label class=" col-md-4 control-label">Giới tính: <?php echo $gioitinh[$i];?> </label>  
                    <label class=" col-md-4 control-label">Kinh nghiệm: <?php echo $kinhnghiem[$i];?> </label>          
                </div>

                <div>
                    <label class=" col-md-4 control-label">Nơi làm việc: <?php echo $noilamviec[$i];?> </label>
                    <label class=" col-md-4 control-label">Ngoại ngữ: <?php echo $ngoaingu[$i];?> </label>    
                </div>

                <div>
                    <br>
                </div>
            	<?php } ?>
                <?php echo $hdv->links(); ?>
            </div>    
            
        </div>
    </div>
</div>	
@endsection
