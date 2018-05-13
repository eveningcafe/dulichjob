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

            <div class="panel-heading"><h5>Hướng dẫn viên</h5></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="GET" action="/CtyHDVSearch">
                        <div>
                            <label class=" col-md-4 control-label">Tên </label>
                            <input type="text" class="form-control col-md-6" name="ten">
                            <br>
                        </div>
                        <div>
                            <label class=" col-md-4 control-label">Giới tính </label>
                            <div >
                            <input type="radio" class="radio-inline col-md-1" name="gioi_tinh" value="Nam">Nam
                            <input type="radio" class="radio-inline col-md-1" name="gioi_tinh" value="Nữ">Nữ
                            <input type="radio" class="radio-inline col-md-1" name="gioi_tinh" value="" checked>Cả 2
                            <br><br>    
                            </div>              
                        </div>
                        <div>
                            <label class=" col-md-4 control-label">Nơi làm việc </label>
                            <input type="text" class="form-control col-md-6" name="noi_lam_viec">
                            <br>
                        </div>
                        <div>
                            <label class=" col-md-4 control-label">Ngoại ngữ </label>
                            <input type="text" class="form-control col-md-6" name="ngoai_ngu">
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