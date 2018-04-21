<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>JOB Portal</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<!-- bootstrap and jquey-->
 <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!-- thu vien tu viet -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />


</head>

<body>

    <div class="meta">
        @if (Route::has('login'))
            @auth
        <div class="metalinks">
            <a href="{{ url('/home') }}"><img src="{{ asset('img/meta1.gif') }}" alt="" width="15" height="14" /></a>
            <?php
if (\Auth::user()) {
	if (\Auth::user()->type == "cty") {
		$link = "CtyAdvancedSearch";
	} else {
		$link = "HdvAdvancedSearch";
	}
} else {
	$link = "notUser";
}
?>
            <a href="<?php echo $link; ?>"><img src="{{ asset('img/meta2.gif') }}" alt="" width="17" height="14" /></a>
            <a href="#"><img src="{{ asset('img/meta5.png') }}" alt="" width="17" height="14" /></a>
            <a href="#"><img src="{{ asset('img/meta4.gif') }}" alt="" width="15" height="14" /></a>
        </div>
            @endauth
        @else
            <p>Tips: <a href="{{ route('login') }}">Log in</a> for <a href="#">Advance search </a></p>
        @endif


    </div>
    <div id="header">
        <a href="{{ url('/') }}" class="logo"><img src="{{ asset('img/logo.jpg')}}" alt="setalpm" width="149" height="28" /></a>
        <span class="slogan">Your Key to Success</span>

        <ul id="menu">
            @if (Route::has('login'))
            @auth
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/logout') }}">Logout</a></li>
            @else
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
            @endauth
            @endif
            <li><a href="#">About Us</a></li>
            <li class="last"><a href="#">Help</a></li>
        </ul>


    </div>
    <div id="content">

        @yield('content')

        <div id="info">
            <div>
                <img src="{{ asset('img/title5.gif') }}" alt="" width="160" height="26" />
                <ul>
                    <li><a href="#">Maecenas hendrerit</a></li>
                    <li><a href="#">Massa ac laoreet iaculipede</a></li>
                    <li><a href="#">Convallis nonummy tellus</a></li>
                    <li><a href="#">In tincidunt mauris</a></li>
                    <li><a href="#">Maecenas hendrerit</a></li>
                    <li><a href="#">Convallis nonummy tellus</a></li>
                    <li><a href="#">In tincidunt mauris</a></li>
                </ul>
            </div>
            <div>
                <img src="{{ asset('img/title6.gif') }}" alt="" width="160" height="26" />
                <ul>
                    <li><a href="#">Maecenas hendrerit</a></li>
                    <li><a href="#">Massa ac laoreet iaculipede</a></li>
                    <li><a href="#">Convallis nonummy tellus</a></li>
                    <li><a href="#">In tincidunt mauris</a></li>
                    <li><a href="#">Maecenas hendrerit</a></li>
                    <li><a href="#">Convallis nonummy tellus</a></li>
                    <li><a href="#">In tincidunt mauris</a></li>
                </ul>
            </div>
            <div>
                <img src="{{ asset('img/title7.gif') }}" alt="" width="160" height="26" />
                <ul>
                    <li><a href="#">Maecenas hendrerit</a></li>
                    <li><a href="#">Massa ac laoreet iaculipede</a></li>
                    <li><a href="#">Convallis nonummy tellus</a></li>
                    <li><a href="#">In tincidunt mauris</a></li>
                    <li><a href="#">Maecenas hendrerit</a></li>
                    <li><a href="#">Convallis nonummy tellus</a></li>
                    <li><a href="#">In tincidunt mauris</a></li>
                </ul>
            </div>
            <div>
                <img src="{{ asset('img/title8.gif') }}" alt="" width="160" height="26" />
                <ul>
                    <li><a href="#">Maecenas hendrerit</a></li>
                    <li><a href="#">Massa ac laoreet iaculipede</a></li>
                    <li><a href="#">Convallis nonummy tellus</a></li>
                    <li><a href="#">In tincidunt mauris</a></li>
                    <li><a href="#">Maecenas hendrerit</a></li>
                    <li><a href="#">Convallis nonummy tellus</a></li>
                    <li><a href="#">In tincidunt mauris</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div id="footer">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           <div class="inner_copy"><a href="http://www.mgwebmaster.com/free-website-builders/">http://www.mgwebmaster.com/free-website-builders/</a></div>
        Copyright &copy;. All rights reserved. Design by <a href="http://www.bestfreetemplates.info" target="_blank" title="Free CSS templates">BFT</a>
    </div>
</body>
</html>
