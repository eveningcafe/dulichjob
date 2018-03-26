@extends('layouts.app')

@section('content')
<img src="{{ asset('img/bigpicture.png')}}" alt="" width="892" height="303" />
		<div class="search">
            <form action="#">
                <img src="{{ asset('img/title.gif') }}" alt="" width="90" height="30" />
                <input type="text" class="first input" value="Enter keywords" /> <input type="text" class="second input" value="Tour Locations (country, city)" />
                <a href="#" class="button">Search</a>
                <div class="line">
                    <input type="checkbox" class="check" /> <span class="exept">Search Title Only</span>
                    <div class="links">
                        <a href="#">Advance search</a>
                    </div>
                </div>
            </form>
        </div>

        <div id="newest_tour" style="border-style: ridge;height: 333px;margin-top: 80px;">
            show cac tour moi nhat vao day (title, thong tin chung,...)

        </div>

@endsection