@extends('layouts.app')

@section('content')
<!-- khung -->
<div style=" margin-top: 99px;border-style: ridge;">
<!-- noi dung -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            	<div class="panel-heading hdv">Các Tour Đã Tạo</div>	

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
                             <th></th>
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
                        <!--sửa action--><td> 
                            <a href="/editTour?tour_id={{$row->tour_id}}">
                                <input type="button" style="background-color: blue; color: white;" value="Edit Tour" />
                            </a></td>
                        <td>
                            <a href="/cancleTour?tour_id={{$row->tour_id}}"><!--Hủy không xóa mà chuyển trạng thái thành hủy-->
                                <input type="button" style="background-color: blue; color: white;" value="Hủy" />
                            </a>
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

