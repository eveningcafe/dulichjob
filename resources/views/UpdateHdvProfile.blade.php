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
if (!isset($hdvname)) {
	$hdvname = '';
}
if (!isset($gioitinh)) {
	$gioitinh = '';
}
if (!isset($sodienthoai1)) {
	$sodienthoai1 = '';
}
if (!isset($sodienthoai2)) {
	$sodienthoai2 = '';
}
if (!isset($kinhnghiem)) {
	$kinhnghiem = '';
}
if (!isset($hocvan)) {
	$hocvan = '';
}
if (!isset($noilamviec)) {
	$noilamviec = '';
}
if (!isset($ngoaingu)) {
	$ngoaingu = '';
}
if (!isset($chungchi)) {
	$chungchi = '';
}
if (!isset($tugioithieu)) {
	$tugioithieu = '';
}
if (!isset($avatarurl)) {
	$avatarurl = '';
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
                    <form class="form-horizontal" method="POST" action="/HdvProfile/update" enctype="multipart/form-data" file="true">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Tên</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo $hdvname; ?>" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                            <label for="sex" class="col-md-4 control-label">Giới tính</label>
                            <div class="col-md-10">
                                <input id="sex" type="text" class="form-control" name="sex" value="<?php echo $gioitinh; ?>" required autofocus>
                                @if ($errors->has('sex'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone1') ? ' has-error' : '' }}">
                            <label for="phone1" class="col-md-4 control-label">Số điện thoại 1</label>

                            <div class="col-md-10">
                                <input id="phone1" type="tel" class="form-control" name="phone1" value="<?php echo $sodienthoai1; ?>" required autofocus>

                                @if ($errors->has('phone1'))
                                {
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone1') }}</strong>
                                    </span>
                                }
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('phone2') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Số điện thoại 2</label>

                            <div class="col-md-10">
                                <input id="phone2" type="tel" class="form-control" name="phone2" value="<?php echo $sodienthoai2; ?>" required autofocus>

                                @if ($errors->has('phone2'))
                                {
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone2') }}</strong>
                                    </span>
                                }
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('experience') ? ' has-error' : '' }}">
                            <label for="experience" class="col-md-4 control-label">Kinh nghiệm</label>

                            <div class="col-md-10">
                                <input id="experience" type="text" class="form-control" name="experience" value="<?php echo $kinhnghiem; ?>" required autofocus>

                                @if ($errors->has('experience'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('experience') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('education') ? ' has-error' : '' }}">
                            <label for="education" class="col-md-4 control-label">Học vấn</label>

                            <div class="col-md-10">
                                <input id="education" type="text" class="form-control" name="education" value="<?php echo $hocvan; ?>" required autofocus>

                                @if ($errors->has('education'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('education') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address-work') ? ' has-error' : '' }}">
                            <label for="address-work" class="col-md-4 control-label">Nơi làm việc</label>

                            <div class="col-md-10">
                                <input id="address-work" type="text" class="form-control" name="address-work" value="<?php echo $noilamviec; ?>" required autofocus>

                                @if ($errors->has('address-work'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address-work') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('english-level') ? ' has-error' : '' }}">
                            <label for="english-level" class="col-md-4 control-label">Ngoại ngữ</label>

                            <div class="col-md-10">
                                <input id="english-level" type="text" class="form-control" name="english-level" value="<?php echo $ngoaingu; ?>" required autofocus>

                                @if ($errors->has('english-level'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('english-level') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('certificate') ? ' has-error' : '' }}">
                            <label for="certificate" class="col-md-4 control-label">Chứng chỉ</label>

                            <div class="col-md-10">
                                <input id="certificate" type="text" class="form-control" name="certificate" value="<?php echo $chungchi; ?>" required autofocus>

                                @if ($errors->has('certificate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('certificate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Tự giới thiệu</label>

                            <div class="col-md-10">
                                <textarea id="description" type="text" class="form-control" name="description" required><?php echo $tugioithieu; ?></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('avatar-url') ? ' has-error' : '' }}">
                            <label for="avatar-url" class="col-md-4 control-label">Avarta URL</label>

                            <div class="col-md-10">
                                <input class="form-control" type="file" name="image" />
                                @if ($errors->has('avatar-url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar-url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <br><div class="form-group">
                            <div class="col-md-10 col-md-offset-4">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-md-offset-2">
            <div>
                <img alt="HDV image here" src={{asset($avatarurl)}} height="400" width="300" style="margin: 10px;" />
            </div>
        </div>
    </div>
</div>
</div>
@endsection

