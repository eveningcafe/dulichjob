<?php
foreach ($data as $row) {
    $dichDen = $row->dia_diem;
    $luongKhach = $row->so_luong_khach;
    $lichTrinh = $row->lich_trinh;
    $yeuCau = $row->yeu_cau;
    $thuLao = $row->thu_lao;
    $slgHDV = $row->so_luong_huongdv;
    $ngLienHe = $row->nguoi_lien_he;
    $emailLienHe = $row->email_lien_he;
    $tgBatDau = $row->thoi_gian_bat_dau;
    $tgKetThuc = $row->thoi_gian_ket_thuc;
    $hanDK = $row->han_dang_ky;
    $moTa = $row->mo_ta;
    $id = $row->tour_id;
}
if (!isset($dichDen)) {
    $dichDen = '';
}
if (!isset($luongKhach)) {
    $luongKhach = '';
}
if (!isset($lichTrinh)) {
    $lichTrinh = '';
}
if (!isset($yeuCau)) {
    $yeuCau = '';
}
if (!isset($thuLao)) {
    $thuLao = '';
}
if (!isset($slgHDV)) {
    $slgHDV = '';
}
if (!isset($ngLienHe)) {
    $ngLienHe = '';
}
if (!isset($emailLienHe)) {
    $emailLienHe = '';
}
if (!isset($tgBatDau)) {
    $tgBatDau = '';
}
if (!isset($tgKetThuc)) {
    $tgKetThuc = '';
}
if (!isset($hanDK)) {
    $hanDK= '';
}
if (!isset($moTa)) {
    $moTa= '';
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
            	<div class="panel-heading hdv">Edit Tour</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/editTour/update">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('dichDen') ? ' has-error' : '' }}">
                            <label for="dichDen" class="col-md-4 control-label">Tour đi</label>

                            <div class="col-md-6">
                                <input id="dichDen" type="text" class="form-control" name="dichDen" value="<?php echo $dichDen; ?>" required autofocus>

                                @if ($errors->has('dichDen'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dichDen') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('luongKhach') ? ' has-error' : '' }}">
                            <label for="luongKhach" class="col-md-4 control-label">Số lượng khách</label>
                            <div class="col-md-6">
                                <input id="luongKhach" type="text" class="form-control" name="luongKhach" value="<?php echo $luongKhach; ?>" required autofocus>
                                @if ($errors->has('luongKhach'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('luongKhach') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lichTrinh') ? ' has-error' : '' }}">
                            <label for="lichTrinh" class="col-md-4 control-label">Lịch trình</label>

                            <div class="col-md-6">
                                <input id="lichTrinh" type="text" class="form-control" name="lichTrinh" value="<?php echo $lichTrinh; ?>" required autofocus>

                                @if ($errors->has('lichTrinh'))
                                {
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lichTrinh') }}</strong>
                                    </span>
                                }
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('yeuCau') ? ' has-error' : '' }}">
                            <label for="yeuCau" class="col-md-4 control-label">Yêu cầu</label>

                            <div class="col-md-6">
                                <input id="yeuCau" type="text" class="form-control" name="yeuCau" value="<?php echo $yeuCau; ?>" required autofocus>

                                @if ($errors->has('yeuCau'))
                                {
                                    <span class="help-block">
                                        <strong>{{ $errors->first('yeuCau') }}</strong>
                                    </span>
                                }
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('thuLao') ? ' has-error' : '' }}">
                            <label for="thuLao" class="col-md-4 control-label">Thù Lao</label>

                            <div class="col-md-6">
                                <input id="thuLao" type="text" class="form-control" name="thuLao" value="<?php echo $thuLao; ?>" required autofocus>

                                @if ($errors->has('thuLao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('thuLao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('slgHDV') ? ' has-error' : '' }}">
                            <label for="slgHDV" class="col-md-4 control-label">Số lượng HDV</label>

                            <div class="col-md-6">
                                <input id="slgHDV" type="text" class="form-control" name="slgHDV" value="<?php echo $slgHDV; ?>" required autofocus>

                                @if ($errors->has('slgHDV'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slgHDV') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ngLienHe') ? ' has-error' : '' }}">
                            <label for="ngLienHe" class="col-md-4 control-label">Người liên hệ</label>

                            <div class="col-md-6">
                                <input id="ngLienHe" type="text" class="form-control" name="ngLienHe" value="<?php echo $ngLienHe; ?>" required autofocus>

                                @if ($errors->has('ngLienHe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ngLienHe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('emailLienHe') ? ' has-error' : '' }}">
                            <label for="emailLienHe" class="col-md-4 control-label">Email liên hệ</label>

                            <div class="col-md-6">
                                <input id="emailLienHe" type="email" class="form-control" name="emailLienHe" value="<?php echo $emailLienHe; ?>" required autofocus>

                                @if ($errors->has('emailLienHe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('emailLienHe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tgBatDau') ? ' has-error' : '' }}">
                            <label for="tgBatDau" class="col-md-4 control-label">Thời gian bắt đầu</label>

                            <div class="col-md-6">
                                <input id="tgBatDau" type="datetime-local" class="form-control" name="tgBatDau" value="<?php echo substr($tgBatDau,0,10).'T'.substr($tgBatDau,11,19); ?>" required autofocus>

                                @if ($errors->has('tgBatDau'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgBatDau') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tgKetThuc') ? ' has-error' : '' }}">
                            <label for="tgKetThuc" class="col-md-4 control-label">Thời gian kết thúc</label>

                            <div class="col-md-6">
                                <input id="tgKetThuc" type="datetime-local" class="form-control" name="tgKetThuc" value="<?php echo substr($tgKetThuc,0,10).'T'.substr($tgKetThuc,11,19); ?>" required autofocus>

                                @if ($errors->has('tgKetThuc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgKetThuc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hanDK') ? ' has-error' : '' }}">
                            <label for="hanDK" class="col-md-4 control-label">Hạn đăng ký</label>

                            <div class="col-md-6">
                                <input id="hanDK" type="datetime-local" class="form-control" name="hanDK" value="<?php echo substr($hanDK,0,10).'T'.substr($hanDK,11,19); ?>" required autofocus>

                                @if ($errors->has('hanDK'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hanDK') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('moTa') ? ' has-error' : '' }}">
                            <label for="moTa" class="col-md-4 control-label">Mô tả</label>

                            <div class="col-md-6">
                                <textarea id="moTa" type="text" class="form-control" name="moTa" required><?php echo $moTa; ?></textarea>

                                @if ($errors->has('moTa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('moTa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <br><div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                            <input type="hidden" name="tour_id" value="<?php echo $id; ?>"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

