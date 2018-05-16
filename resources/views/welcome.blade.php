
@extends('layouts.app')

@section('content')
<img src="{{ asset('img/bigpicture.png')}}" alt="" width="859" height="303" />

        <div class="search">
        @if (!Auth::check())
            <form>
                <span> sign in to search </span>
                <div class="line">
                </div>
            </form>
        </div>
        @else
            <form action="#">
                <img src="{{ asset('img/title.gif') }}" alt="" width="90" height="30"/>
                @if(Auth::user()->type == "cty")
                    <a href="{{url('ctySearchTour')}}" class="btn btn-default">Search tour</a>
                    <a href="{{url('ctySearchHDV')}}" class="btn btn-default">Search huong dan vien</a>
                @elseif(Auth::user()->type == "hdv")
                    <a href="{{url('hdvSearchTour')}}" class="btn btn-default">Search tour</a>
                    <a href="{{url('hdvSearchCty')}}" class="btn btn-default">Search cong ty</a>
                @endif
                <div class="line">
                 </div>
            </form>
        </div>
        @endif

        <div id="newest_tour">
            @foreach ($newTours as $n)
            <p>
                <b>Tour đi:       </b> {{$n->dia_diem}} <br/>
                <b>Lịch trình:    </b> {{$n->lich_trinh}}<br/>
                <b>Lượng Khách:   </b> {{number_format($n->so_luong_khach)}} <br/>
                <b>Thời gian tạo: </b> {{$n->created_at}} <br/>
                <a href="{{url('viewInforTour',$n->id)}}">Xem chi tiết</a>
            </p>
            @endforeach

        </div>

@endsection