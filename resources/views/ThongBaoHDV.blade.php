@extends('layouts.app')

@section('content')
<!-- khung -->
<div style=" margin-top: 99px;border-style: ridge;">
<!-- noi dung -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            	<div class="panel-heading hdv">Thông Báo Của Bạn</div>

                <div class="panel-body">
                    <ul>
                        @foreach($data as $r)
                        <li>Tour đi: {{$r->dia_diem}} <br/>
                            Lịch trình: {{$r->lich_trinh}}<br/>
                            Số lượng khách:{{$r->so_luong_khach}}<br/>
                            <?php if($r->noi_dung_tb=="Thay đổi") {?>
                            <b>Đã bị thay đổi lúc: {{$r->thoi_gian}}</b><br/>
                            <a href="{{url('viewInforTour',$r->tour_id)}}">Xem Và Đăng Ký Lại</a></li>
                            <?php }else if($r->noi_dung_tb=="Hủy") {?>
                            <b>Đã bị hủy lúc: {{$r->thoi_gian}}</b><br/>
                            <?php }else if($r->noi_dung_tb=="accept") {?>
                            <b>Đã đồng ý bạn lúc: {{$r->thoi_gian}}</b><br/>
                            <?php }else if($r->noi_dung_tb=="deny") {?>
                            <b>Đã từ chối bạn lúc: {{$r->thoi_gian}}</b><br/>
                            <?php }?>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

