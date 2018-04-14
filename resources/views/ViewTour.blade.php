<?php
	foreach($tour as $row)
	{
		$dia_diem = $row->dia_diem;
	    $so_luong_khach = $row->so_luong_khach;
	    $lich_trinh = $row->lich_trinh;
	    $tinh_trang = $row->tinh_trang;
    }
?>
@extends('layouts.app')

@section('content')
<!-- khung -->
<div style=" margin-top: 99px;border-style: ridge;">
<!-- noi dung -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            	<div class="panel-heading hdv">TOUR PROFILE</div>	

                <div class="panel-body">
                
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Địa điểm:</label>

                                <?php echo $dia_diem; ?>
                        </div>

                        <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                            <label for="number" class="col-md-4 control-label">Số lượng khách</label>

                                <?php echo $so_luong_khach; ?>
                        </div>

                        <div class="form-group{{ $errors->has('lich_trinh') ? ' has-error' : '' }}">
                            <label for="lich_trinh" class="col-md-4 control-label">Lịch trình</label>

                                <?php echo $lich_trinh; ?>
                        </div>

                         <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Tình trạng</label>

                                <?php echo $tinh_trang; ?>
                        </div>
                        <br>                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

