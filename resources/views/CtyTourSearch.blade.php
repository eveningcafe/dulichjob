@extends('layouts.app')

@section('content')
<!-- khung -->
<div style=" margin-top: 99px;border-style: ridge;">
<!-- noi dung -->
<div class="container">
    <div class="row">
        <div class="panel-heading"><h1>Advanced Search</h1></div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">        
            <div class="panel-heading"><h5>Tour của bạn</h5></div> 
                <div class="panel-body">
                    <form class="form-horizontal" method="GET" action="/CtyTourSearch">
                        <div>
                            <label class=" col-md-4 control-label">Địa điểm</label>
                            <input type="text" class="form-control col-md-6" name="dia_diem">
                            <br>
                        </div>
                        <div>
                            <label class=" col-md-4 control-label">Lịch trình</label>
                            <input type="text" class="form-control col-md-6" name="lich_trinh">
                            <br>
                        </div>    
                        <div>
                            <label class=" col-md-4 control-label">Tình trạng</label>
                            <div >
                            <input type="radio" class="radio-inline col-md-1" name="tinh_trang" value="Đang xếp lịch">Đang xếp lịch
                            <input type="radio" class="radio-inline col-md-1" name="tinh_trang" value="Đang đi">Đang đi
                            <input type="radio" class="radio-inline col-md-1" name="tinh_trang" value="Đã hoàn thành" >Đã hoàn thành
                            <input type="radio" class="radio-inline col-md-1" name="tinh_trang" value="Đã hủy" >Đã hủy 
                            <input type="radio" class="radio-inline col-md-1" name="tinh_trang" value="" checked>Không biết
                            <br><br>    
                            </div>   
                        </div>
                        <div>
                            <label class=" col-md-4 control-label">Thời gian bắt đầu</label>
                            <br>Từ<input type="date" class="form-control col-md-6" name="date1" value="1900-01-01" required>
                            Đến<input type="date" class="form-control col-md-6" name="date2" value="2500-12-31" required>
                            <br>
                        </div>   
                        <div>
                            <label class=" col-md-4 control-label">Thời gian kết thúc</label>
                            <br>Từ<input type="date" class="form-control col-md-6" name="date3" value="1900-01-01" required>
                            Đến<input type="date" class="form-control col-md-6" name="date4" value="2500-12-31" requireds> 
                            <br>
                        </div>                    

                </div>  
                <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Search
                                </button>
                            </div>
                        </div>        

                    </form>
        </div>
    </div>
</div>
@endsection