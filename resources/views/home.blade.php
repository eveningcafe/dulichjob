@extends('layouts.app')

@section('content')
<!-- khung -->
<div style=" margin-top: 99px;border-style: ridge;">
<!-- noi dung -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <ul id="header">
                    @if (Route::has('login'))
                    @auth
                    <li><a href="{{ url('/HdvProfile') }}">View Profile</a></li>
                    @endauth
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
