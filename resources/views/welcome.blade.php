<?php
    if(\Auth::user())
    {
        if(\Auth::user()->type=="cty")
        {
            $link="CtyAdvancedSearch";
        } 
        else
        {
            $link="HdvAdvancedSearch";
        }   
    }
    else
        {
            $link="notUser";
        }
?>


@extends('layouts.app')

@section('content')
<img src="{{ asset('img/bigpicture.png')}}" alt="" width="892" height="303" />
		<div class="search">
            <form action="#">
                <img src="{{ asset('img/title.gif') }}" alt="" width="90" height="30" />
                <input type="text" class="first input" value="Enter keywords" /> <input type="text" class="second input" value="Tour Locations (country, city)" />
                <a href="<?php echo $link1; ?>" class="button">Search</a>
                <div class="line">
                    <input type="checkbox" class="check" /> <span class="exept">Search Title Only</span>
                    <div class="links">
                        <a href="<?php echo $link; ?>">Advance search</a>                        
                    </div>
                </div>
            </form>
        </div>

        <div id="newest_tour" style="border-style: ridge;height: 333px;margin-top: 80px;overflow: auto;">
            @foreach ($newTours as $n)
            <p style="margin:15px 0 20px 25px;">
                <b>Tour đi:</b>  {{$n->dia_diem}} <br/>
                <b>Lịch trình:</b> {{$n->lich_trinh}}<br/>
                <b>Lượng Khách:</b> {{number_format($n->so_luong_khach)}} <br/>
                <b>Thời gian tạo:</b> {{$n->created_at}} <br/>
                <hr/>
            </p>
            @endforeach

        </div>

@endsection