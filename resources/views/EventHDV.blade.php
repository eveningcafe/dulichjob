@extends('layouts.app')

@section('content')
<!-- khung -->
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<style>

.as:link, a:visited {
    background-color: gray;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
	width:100%;
	margin: 6px;
}


.as:hover, a:active {
    background-color: #A9A9A9;
    background-size:contain;
}
.bs:link, a:visited {
    background-color: #DCDCDC;
    color: black;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
	width:100%;
	margin: 6px;
}

.bs:hover, a:active {
    background-color: #A9A9A9;
    background-size:contain;
}

}
</style>

<div style=" margin-top: 99px;border-style: ridge;">
<!-- noi dung -->
<div class="container">
    <div class="row">
        <div class="panel-heading"><h3>Thông báo</h3></div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
			@foreach ($tourResults as $tourResult)
				@if ($tourResult->tinh_trang_dk=='accept')
					@if($tourResult->event_to_hdv=='cho tin')
						<div>
						<a href="{{url('clickSeeResult',$tourResult->tour_id)}}" class="as">Ban da duoc chap nhan tham gia tour di {{$tourResult->tenTour}}</a>
    					</div>
					@elseif($tourResult->event_to_hdv=='da xem')
						<div>
						<a href="{{url('clickSeeResult',$tourResult->tour_id)}}" class="bs">Ban da duoc chap nhan tham gia tour di {{$tourResult->tenTour}}</a>
    					</div>
					@endif


    			@else
    				<a href="{{url('clickSeeResult',$tourResult->tour_id)}}" class="as">Rat tiec ban khong duoc chap nhan tham gia tour di {{$tourResult->tenTour}}</a>
    				</div>
				@endif

			@endforeach
			@foreach ($tourInvites as $tourInvite)
				@if($tourInvite->trang_thai=='not_see')
					<div>
					<a href="{{url('clickSeeInvite',$tourInvite->tour_id)}}" class="as">Ban duoc cong ty {{$tourInvite->tenCty}} moi tham gia tour di {{$tourInvite->tenTour}} </a>
    				</div>
				@elseif($tourInvite->trang_thai=='not_decide')
					<div>
					<a href="{{url('clickSeeInvite',$tourInvite->tour_id)}}" class="bs">Ban duoc cong ty {{$tourInvite->tenCty}} moi tham gia tour di {{$tourInvite->tenTour}} </a>
    				</div>
				@endif

			@endforeach

        </div>
    </div>
</div>
</div>
@endsection