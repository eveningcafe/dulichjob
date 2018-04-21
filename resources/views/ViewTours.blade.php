@extends('layouts.app')

@section('content')
        <div id="newest_tour" style="border-style: ridge;height: 333px;margin-top: 80px;overflow: auto;">
            @foreach ($newTours as $n)
            <div style="margin:15px 0 20px 25px;">
                <b>Tour đi:</b>  {{$n->dia_diem}} <br/>
                <b>Lịch trình:</b> {{$n->lich_trinh}}<br/>
                <b>Lượng Khách:</b> {{number_format($n->so_luong_khach)}} <br/>
                <b>Thời gian tạo:</b> {{$n->created_at}} <br/>
                <a href="{{url('viewInforTour',$n->id)}}">Xem chi tiết</a>
                <hr/>
            </p>
        </div>
            @endforeach

        </div>

@endsection