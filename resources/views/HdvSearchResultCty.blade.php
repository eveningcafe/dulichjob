<?php
	foreach($cty as $key => $row)
	{
        $cty_id[$key] = $row->id;
        $ten[$key] = $row->ten;
        $image[$key] = $row->avatar_url;
	}
	$count2 = $cty->count();
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
            
            <div class="panel-heading"><h5>Thông tin công ty</h5></div>
            <div class="panel-body">
            	<?php for($i=0;$i<$count2;$i++) { ?>
            	<div>
            		<a class="col-md-4" style="font-size: 20px" href="/viewInfoCty/<?php echo $cty_id[$i]; ?>">Tên: <?php echo $ten[$i]; ?></a>           		
            	</div>
                <div>
                    <label class=" col-md-4 control-label">Link ảnh công ty:</label>
                    <?php echo $image[$i];?>
                    <br>
                </div>
            	<?php } ?>
            </div>
        </div>
    </div>
</div>	
@endsection
