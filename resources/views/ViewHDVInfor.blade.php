<?php
foreach ($data as $row) {
    $ten = $row->ten;
    $anh = $row->avatar_url;
    $kinhNghiem = $row->kinh_nghiem;
    $hocVan = $row->hoc_van;
    $ngoaiNgu = $row->ngoai_ngu;
    $chungChi = $row->chung_chi;
    $moTa = $row->tu_gioi_thieu;
    }

if (!isset($ten)) {
    $ten = '';
}
if (!isset($anh)) {
    $anh = '';
}
if (!isset($kinhNghiem)) {
    $kinhNghiem = '';
}
if (!isset($hocVan)) {
    $hocVan= '';
}
if (!isset($ngoaiNgu)) {
    $ngoaiNgu = '';
}
if (!isset($chungChi)) {
    $chungChi= '';
}
if (!isset($moTa)) {
    $moTa = '';
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
                <div class="panel-heading hdv">Thông Tin Hướng Dẫn Viên</div>

                <div class="panel-body">
                    
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('ten') ? ' has-error' : '' }}">
                            <label for="ten" class="col-md-4 control-label">Hướng Dẫn Viên</label>
                                <?php echo $ten; ?>
                        </div>

                        <div class="form-group{{ $errors->has('kinhNghiem') ? ' has-error' : '' }}">
                            <label for="kinhNghiem" class="col-md-4 control-label">Kinh Nghiệm</label>
                                <?php echo $kinhNghiem; ?>
                        </div>

                        <div class="form-group{{ $errors->has('hocVan') ? ' has-error' : '' }}">
                            <label for="hocVan" class="col-md-4 control-label">Học Vấn</label>
                                <?php echo $hocVan; ?>
                        </div>

                        <div class="form-group{{ $errors->has('ngoaiNgu') ? ' has-error' : '' }}">
                            <label for="ngoaiNgu" class="col-md-4 control-label">Ngoại Ngữ</label>
                                <?php echo $ngoaiNgu; ?>
                        </div>

                        <div class="form-group{{ $errors->has('chungChi') ? ' has-error' : '' }}">
                            <label for="chungChi" class="col-md-4 control-label">Chứng Chỉ</label>
                                <?php echo $chungChi; ?>
                        </div>

                        <div class="form-group{{ $errors->has('moTa') ? ' has-error' : '' }}">
                            <label for="moTa" class="col-md-4 control-label">Mô Tả</label>
                            <?php echo $moTa; ?>
                        </div>

                        <div class="form-group{{ $errors->has('anh') ? ' has-error' : '' }}">
                            <label for="anh" class="col-md-4 control-label">Hình ảnh</label>
                            <img src="<?php echo $anh; ?>" />
                        </div>                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

