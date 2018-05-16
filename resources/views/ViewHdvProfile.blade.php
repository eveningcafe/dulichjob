<?php
foreach ($data as $row) {
	$hdvname = $row->ten;
	$gioitinh = $row->gioi_tinh;
	$sodienthoai1 = $row->so_dien_thoai_1;
	$sodienthoai2 = $row->so_dien_thoai_2;
	$kinhnghiem = $row->kinh_nghiem;
	$hocvan = $row->hoc_van;
	$noilamviec = $row->noi_lam_viec;
	$ngoaingu = $row->ngoai_ngu;
	$chungchi = $row->chung_chi;
	$tugioithieu = $row->tu_gioi_thieu;
	$avatarurl = $row->avatar_url;
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
            	<div class="panel-heading hdv">YOUR PROFILE</div>

                <div class="panel-body">
                    <form class="form-horizontal" action="/HdvProfile/update">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Tên:</label>

                                <?php echo $hdvname; ?>
                        </div>

                        <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                            <label for="sex" class="col-md-4 control-label">Giới tính</label>

                                <?php echo $gioitinh; ?>
                        </div>

                        <div class="form-group{{ $errors->has('phone1') ? ' has-error' : '' }}">
                            <label for="phone1" class="col-md-4 control-label">Số điện thoại 1</label>

                                <?php echo $sodienthoai1; ?>
                        </div>

                         <div class="form-group{{ $errors->has('phone2') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Số điện thoại 2</label>

                                <?php echo $sodienthoai2; ?>
                        </div>

                        <div class="form-group{{ $errors->has('experience') ? ' has-error' : '' }}">
                            <label for="experience" class="col-md-4 control-label">Kinh nghiệm</label>

                           <?php echo $kinhnghiem; ?>
                        </div>

                        <div class="form-group{{ $errors->has('education') ? ' has-error' : '' }}">
                            <label for="education" class="col-md-4 control-label">Học vấn</label>

                                <?php echo $hocvan; ?>
                        </div>

                        <div class="form-group{{ $errors->has('address-work') ? ' has-error' : '' }}">
                            <label for="address-work" class="col-md-4 control-label">Nơi làm việc</label>

                                <?php echo $noilamviec; ?>
                        </div>

                        <div class="form-group{{ $errors->has('english-level') ? ' has-error' : '' }}">
                            <label for="english-level" class="col-md-4 control-label">Ngoại ngữ</label>

                                <?php echo $ngoaingu; ?>
                        </div>

                        <div class="form-group{{ $errors->has('certificate') ? ' has-error' : '' }}">
                            <label for="certificate" class="col-md-4 control-label">Chứng chỉ</label>

                                <?php echo $chungchi; ?>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Tự giới thiệu</label>

                                <?php echo $tugioithieu; ?>
                        </div>



                        <br><div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Update Profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-md-offset-2">
            <div>
                <img alt="HDV image here" src={{asset($avatarurl)}} height="400" width="300" />
                <input type="button" style="margin: 10px;" onclick="location.href='{{ url('/viewTour') }}';" value="View Tour" />
                <input type="button" style="margin: 10px;" onclick="location.href='{{ url('/viewAppliedTour') }}';" value="Tour Đã Đăng Ký" />
                <input type="button" style="margin: 10px;" onclick="location.href='{{ url('/thongBaoHDV') }}';" value="Thông Báo" />
            </div>

        </div>
    </div>
</div>
</div>
@endsection

