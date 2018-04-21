@extends('layouts.app')

@section('content')
<!-- khung -->
<div style=" margin-top: 99px;border-style: ridge;">
<!-- noi dung -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            	<div class="panel-heading hdv">Các Tour Đã Đăng Ký</div>

                <div class="panel-body">
                    <!--sửa action--><form class="form-horizontal" action="/HdvProfile/update">
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
                             <th>Công Ty</th>
                             <th>Tình Trạng Tour</th>
                             <th>Trạng Thái Đăng Ký</th>
                             <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $row)
                        <tr>
                        <td><a href="{{url('viewInforTour',$row->tour_id)}}">{{$row->dia_diem}}</a></td>
                        <td> {{number_format($row->so_luong_khach)}}</td>
                        <td> {{$row->yeu_cau}} </td>
                        <td> {{$row->thoi_gian_bat_dau}} </td>
                        <td> {{$row->thoi_gian_ket_thuc}} </td>
                        <td> {{$row->han_dang_ky}} </td>
                        <td> {{$row->ten}} </td>
                        <td> {{$row->tinh_trang}} </td>
                        <td> {{$row->tinh_trang_dk}} </td>
                        <!--sửa action--><td>
                            <span><a href="/huydkTour/delete?edit={{$row->tour_id}}"><input type="button" style="background-color: blue; color: white;" value="Hủy ĐK" ></a></span>

                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

