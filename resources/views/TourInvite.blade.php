<?php
	foreach($tour as $key => $row)
	{
        $tour_id[$key] = $row->id;
		$dia_diem[$key] = $row->dia_diem;
		$lich_trinh[$key] = $row->lich_trinh;
		$mo_ta[$key] = $row->mo_ta;
		$thoi_gian_bat_dau[$key] = $row->thoi_gian_bat_dau;
	}
	$count = $tour->count();
?>
<script>
	function expand(i,total,tour_id)
	{
		for(x=0;x<total;x++)
		{
			var c = "row" + x;
			document.getElementById(c).style.backgroundColor = "white";
		}
		var b = "row" + i;
		document.getElementById(b).style.backgroundColor = "#ddd";
		document.getElementById("submit").style.display = "block";
		document.getElementById("tour_id").setAttribute("value",tour_id);
	}

	function filter()
	{
		var input, filter, table, tr, td, i;
  		input = document.getElementById("myInput");
  		filter = input.value.toUpperCase();
  		table = document.getElementById("myTable");
  		tr = table.getElementsByTagName("tr");

  		for(i=0; i<tr.length;i++)
  		{
  			td = tr[i].getElementsByTagName("td")[0];
  			if(td)
  			{
  				if(td.innerHTML.toUpperCase().indexOf(filter) > -1)
  				{
  					tr[i].style.display = "";
  				}
  				else
  				{
  					tr[i].style.display = "none";
  				}
  			}
  		}
	}
</script>
<style>
.hidden-content {
	display: none;
}

#myInput {
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}

</style>


@extends('layouts.app')
@section('content')
<!-- khung -->
<div style=" margin-top: 99px;border-style: ridge;">
<!-- noi dung -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            	<div class="panel-heading hdv">Các Tour của bạn</div>	

                <div class="panel-body">
                	<div>
                		 <input type="text" id="myInput" onkeyup="filter()" placeholder="Search for tours..">
                	</div>

                    <table class="data-table" id="myTable"> 
                    	<tr>
                             <th>Tên tour</th>
                             <th>Lịch trình</th>
                             <th>Mô tả</th>
                             <th>Thời Gian Bắt Đầu</th>
                        </tr>
                        <?php for($i=0;$i<$count;$i++){ ?>
                        <tr onclick="expand(<?php echo $i ?>,<?php echo $count ?>,<?php echo $tour_id[$i] ?>)" id="row<?php echo $i ?>">
                        <td><?php echo $dia_diem[$i]; ?></td>
                        <td> <?php echo $lich_trinh[$i]; ?></td>
                        <td> <?php echo $mo_ta[$i]; ?> </td>
                        <td> <?php echo $thoi_gian_bat_dau[$i]; ?> </td>                   
                        </tr>      	

                    	<?php } ?>
                    </table>
                    <br>
                    <div class="hidden-content" id="submit">
                    <form action="/SendInvitation" method="POST">
                    	{{ csrf_field() }}
            			<textarea class="form-control" placeholder="Để lại lời nhắn" name="ghi_chu" cols="10" rows="2"></textarea><br>
            			<button type="submit" name="submit" class="btn btn-primary">
            			<input type="hidden" name="tour_id" id="tour_id" >
            			<input type="hidden" name="cty_id" value="<?php echo $cty_id ?>" >
            			<input type="hidden" name="hdv_id" value="<?php echo $hdv_id ?>" >
                            Gửi lời mời
                         </button>
            		</form>  
                    <div> 
                   
                </div>
            </div>
        </div>
    </div>
</div>
</div>	
	

@endsection