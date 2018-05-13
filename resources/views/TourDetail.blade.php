<?php
foreach ($tour as $row) {
	$dichDen = $row->dia_diem;
	$luongKhach = $row->so_luong_khach;
	$lichTrinh = $row->lich_trinh;
	$yeuCau = $row->yeu_cau;
	$thuLao = $row->thu_lao;
	$slgHDV = $row->so_luong_huongdv;
    $lien_he = $row->nguoi_lien_he;
    $email = $row->email_lien_he;
	$tgBatDau = $row->thoi_gian_bat_dau;
	$tgKetThuc = $row->thoi_gian_ket_thuc;
	$hanDK = $row->han_dang_ky;
	$moTa = $row->mo_ta;
	$id = $row->tour_id;
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
                <div class="panel-heading hdv">Tour Information</div>

                <div class="panel-body">                 
                        <div class="form-group{{ $errors->has('dichDen') ? ' has-error' : '' }}">
                            <label for="dichDen" class="col-md-4 control-label">Tour đi</label>
                                <?php echo $dichDen; ?>
                        </div>

                        <div class="form-group{{ $errors->has('luongKhach') ? ' has-error' : '' }}">
                            <label for="luongKhach" class="col-md-4 control-label">Số lượng khách</label>
                            <?php echo $luongKhach; ?>
                        </div>

                        <div class="form-group{{ $errors->has('lichTrinh') ? ' has-error' : '' }}">
                            <label for="lichTrinh" class="col-md-4 control-label">Lịch trình</label>
                            <?php echo $lichTrinh; ?>
                        </div>

                         <div class="form-group{{ $errors->has('yeuCau') ? ' has-error' : '' }}">
                            <label for="yeuCau" class="col-md-4 control-label">Yêu cầu</label>
                            <?php echo $yeuCau; ?>
                        </div>

                        <div class="form-group{{ $errors->has('thuLao') ? ' has-error' : '' }}">
                            <label for="thuLao" class="col-md-4 control-label">Thù Lao</label>
                            <?php echo $thuLao; ?>
                        </div>

                        <div class="form-group{{ $errors->has('slgHDV') ? ' has-error' : '' }}">
                            <label for="slgHDV" class="col-md-4 control-label">Số lượng HDV</label>
                            <?php echo $slgHDV; ?>
                        </div>

                        <div class="form-group{{ $errors->has('lien_he') ? ' has-error' : '' }}">
                            <label for="lien_he" class="col-md-4 control-label">Người liên hệ</label>
                            <?php echo $lien_he; ?>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email liên hệ</label>
                            <?php echo $email; ?>
                        </div>

                        <div class="form-group{{ $errors->has('tgBatDau') ? ' has-error' : '' }}">
                            <label for="tgBatDau" class="col-md-4 control-label">Thời gian bắt đầu</label><?php echo $tgBatDau; ?>
                        </div>

                        <div class="form-group{{ $errors->has('tgKetThuc') ? ' has-error' : '' }}">
                            <label for="tgKetThuc" class="col-md-4 control-label">Thời gian kết thúc</label><?php echo $tgKetThuc; ?>
                        </div>

                        <div class="form-group{{ $errors->has('hanDK') ? ' has-error' : '' }}">
                            <label for="hanDK" class="col-md-4 control-label">Hạn đăng ký</label>
                            <?php echo $hanDK; ?>
                        </div>

                        <div class="form-group{{ $errors->has('moTa') ? ' has-error' : '' }}">
                            <label for="moTa" class="col-md-4 control-label">Mô tả</label>
                            <?php echo $moTa; ?>
                        </div>

                        <div class="form-group{{ $errors->has('tinh_trang') ? ' has-error' : '' }}">
                            <label for="tinh_trang" class="col-md-4 control-label">Tình trạng</label>
                            <?php echo $tinh_trang; ?>
                        </div>

                        <br>
                        <form class="form-horizontal" method="GET" action="/editTour">
                        <?php if(strcmp($tinh_trang,"đang xếp lịch") == 0){ ?>
                        <div class="form-group">
                            <input type="hidden" name="edit" value="<?php echo $id; ?>">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Edit tour
                                </button>
                            </div>
                        </div>
                        <?php } ?>
                    </form>
                        <?php if(strcmp($tinh_trang,"đang xếp lịch") == 0){ ?>
                        <form class="form-horizontal" method="GET" action="/cancleTour">
                        <div class="form-group">
                            <input type="hidden" name="edit" value="<?php echo $id; ?>">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Hủy tour
                                </button>
                            </div>
                        </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

