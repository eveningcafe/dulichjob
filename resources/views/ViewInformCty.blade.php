<?php
foreach ($cty as $row) {
	$ctyname = $row->ten;
	$gioithieu = $row->tu_gioi_thieu;
	$website = $row->website_url;
	$image = $row->avatar_url;
}
$count = $vp->count();
if ($count != 0) {
	foreach ($vp as $key => $row) {
		$address[$key] = $row->dia_chi;
		$email[$key] = $row->email;
		$phone[$key] = $row->so_dien_thoai;
	}
} else {
	$count = 1;
	$address[0] = '';
	$email[0] = '';
	$phone[0] = '';
}
?>
@extends('layouts.app')

@section('content')
<!-- khung -->
<div style=" margin-top: 99px;border-style: ridge;">
<!-- noi dung -->
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <div class="panel panel-default">
            	<div class="panel-heading hdv">CTY PROFILE</div>

                <div class="panel-body">


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Tên:</label>

                                <?php echo $ctyname; ?>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Giới thiệu</label>

                                <?php echo $gioithieu; ?>
                        </div>

                        <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                            <label for="link" class="col-md-4 control-label">Website URL</label>

                                <?php echo $website; ?>
                        </div>

                <?php for ($i = 0; $i < $count; $i++) {?>
                    <div> <label for="description" class="col-md-4 control-label">Văn phòng </label> </div>
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address" class="col-md-4 control-label">Địa chỉ</label>

                            <?php echo $address[$i]; ?>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email[]" class="col-md-4 control-label">Email</label>

                            <?php echo $email[$i]; ?>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="phone[]" class="col-md-4 control-label">Điện thoại</label>

                            <?php echo $phone[$i]; ?>
                    </div>
                <?php }?>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-md-offset-2">
            <img alt="Company image here" src={{asset($image)}} height="200" width="300"/>
        </div>
    </div>
</div>
</div>
@endsection

