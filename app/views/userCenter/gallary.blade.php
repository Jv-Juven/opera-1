@extends('layouts.subpage')

@section('title')
	<title>照片</title>
@stop

@section('css')
	@parent
	<!-- <link rel="stylesheet" href="/lib/css/swiper3.1.0.min.css"> -->
	<link rel="stylesheet" href="/dist/css/userCenter/gallary/gallary.css">
@stop

@section('page-left-nav')
@stop

@section('page-content')
	<div id="mask" style="display:none;"></div>
	<div class="page-content gallary-page" data-user-id="{{{ $user_id }}}" style="padding:0px;">
		<a href="/user/album?user_id={{{ $user_id }}}" class="return-btn">返回个人中心->相册页面</a>
		<div style="clear:both;"></div>
		<div class="photos" data-album-id="{{$album_id}}">
			@foreach($photos as $photo)
			<div class="photo">
				@if(Auth::check())
					@if(Auth::user()->id == $user_id)
				<span class="delete-btn">×</span>
					@endif
				@endif
				<input type="hidden" class="id" value="{{ $photo->id }}" />
				<img src="{{ $photo->picture }}" width="236" height="195" />
			</div>
			@endforeach
			<!--wuhui START-->
			@if(Auth::check())
				@if(Auth::user()->id == $user_id)
			<div id="photo_add" class="photo-add">
				<div class="photo-add-sign">
					+
				</div>
				<div class="photo-add-text">
					添加相片
				</div>
				<input id="photo_add_btn" type="file"/>
			</div>
				@endif
			@endif
			<!--wuhui END-->
			<div style="clear:both;"></div>
		</div>
	</div>
	<div id="photo-album-swiper">
		<div class="swiper-containter photo-album-swiper">
			<div class="swiper-wrapper">
				@foreach($photos as $photo)
				<div class="swiper-slide">
					<img src="{{ $photo->picture }}"/>
				</div>
				@endforeach
			</div>
		</div>
		<!-- 如果需要导航按钮 -->
		<div class="swiper-button-prev">
			<img src="/images/userCenter/Swiper_prev.png" alt="">
		</div>
		<div class="swiper-button-next">
			<img src="/images/userCenter/Swiper_next.png" alt="">
		</div>
		<div style="clear:both;"></div>
	</div>

	<div class="gallary-mask white-mask"></div>
@stop

@section('js')
	@parent
    <script type="text/javascript" src="/dist/js/lib/plugins/qiniu.min.js"></script>
    <script type="text/javascript" src="/dist/js/lib/plugins/plupload.full.min.js"></script>
	<!-- // <script type="text/javascript" src="/dist/js/lib/plugins/swiper.min.js"></script> -->
	<script type="text/javascript" src="/dist/js/pages/gallary.js"></script>
@stop