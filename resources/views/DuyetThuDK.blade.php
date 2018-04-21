@extends('layouts.app')

@section('content')
<!-- khung -->
<div style=" margin-top: 99px;border-style: ridge;">
<!-- noi dung -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            	<div class="panel-heading hdv">Các Đăng Ký Của HDV</div>

                <div class="panel-body">
                        {{ csrf_field() }}

                    <table class="data-table">
                        <thead>
                        <tr>
                             <th>Tour Đi</th>
                             <th>Số Lượng Khách</th>
                             <th>Yêu Cầu</th>
                             <th>Thời Gian Bắt Đầu</th>
                             <th>Thời Gian Kết Thúc</th>
                             <th>Hạn Đăng Ký</th>
                             <th>HDV Đăng Ký</th>
                             <th>Tình Trạng</th>
                             <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $row)
                        <tr>
                        <td>{{$row->dia_diem}} </td>
                        <td> {{number_format($row->so_luong_khach)}}</td>
                        <td> {{$row->yeu_cau}} </td>
                        <td> {{$row->thoi_gian_bat_dau}} </td>
                        <td> {{$row->thoi_gian_ket_thuc}} </td>
                        <td> {{$row->han_dang_ky}} </td>
                        <td> <a href="{{url('viewHDV',$row->huongdv_id)}}" >{{$row->ten}}</a></td>
                        <td> {{$row->tinh_trang_dk}} </td>
                        <!--sửa action--><td>
                            <span><a href="/respondHDV/update?edit={{$row->tour_id}}&tt=accept&HDVid={{$row->huongdv_id}}"><input type="button" style="background-color: blue; color: white;" value="Nhận HDV" ></a></span>
                            <span><a href="/respondHDV/update?edit={{$row->tour_id}}&tt=deny&HDVid={{$row->huongdv_id}}"><input type="button" style="background-color: blue; color: white;" value="Từ chối HDV" ></a></span>

                        </td>
                        </tr>

                    @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

