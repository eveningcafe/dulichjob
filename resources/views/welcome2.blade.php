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

        <div id="blocks">
            <div class="block">
                <img src="{{ asset('img/title1.gif')}}" alt="" width="214" height="29" /><br />
                <img src="{{ asset('img/map.jpg')}}" alt="" width="214" height="160" /><br />
                <a href="#" class="more"><img src="{{ asset('img/morey.jpg') }}" alt="" width="105" height="27" /></a>
            </div>
            <div class="block">
                <img src="{{ asset('img/title2.gif') }}" alt="" width="214" height="29" /><br />
                <p class="red_text">Maecenas hendrerit, massa ac laoreet iaculipede mnisl ullamcorper- massa, cosectetuer feipsum eget pede. Proin nunc. Donec nonummy, tellus er sodales enim, in tincidun- mauris in odio. Massa ac laoreet iaculipede nisl ullamcorpermassa, ac consectetuer feipsum eget pede.  Proin nunc. Donec massa.</p>
                <a href="#" class="more"><img src="{{ asset('img/morer.jpg')}}" alt="" width="105" height="27" /></a>
            </div>
            <div class="block">
                <img src="{{ asset('img/title3.gif') }}" alt="" width="214" height="29" /><br />
                <ul id="list">
                    <li><a href="#">Maecenas hendrerit</a></li>
                    <li><a href="#">Massa ac laoreet iaculipede</a></li>
                    <li><a href="#">Convallis nonummy tellus</a></li>
                    <li><a href="#">In tincidunt mauris</a></li>
                    <li><a href="#">Maecenas hendrerit</a></li>
                    <li><a href="#">Consectetuer feipsum eget</a></li>
                </ul>
                <a href="#" class="more"><img src="{{ asset('img/moreg.jpg') }}" alt="" width="106" height="27" /></a>
            </div>
            <div class="block">
                <img src="{{ asset('img/title4.gif') }}" alt="" width="214" height="29" /><br />
                <p class="gray_text">Maecenas hendrerit, massa ac laoreet iaculipede mnisl ullamcorper- massa, cosectetuer feipsum eget pede. Proin nunc. Donec nonummy, tellus er sodales enim, in tincidun- mauris in odio. </p>
                <form action="#">
                    <input type="text" class="signup input" value="Your E-mail Address" />
                    <a href="#" class="submit"><img src="{{ asset('img/submit.jpg') }}" alt="" width="69" height="25" /></a>
                </form>
            </div>
        </div>

@endsection