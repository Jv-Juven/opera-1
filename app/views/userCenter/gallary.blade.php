@extends('layouts.subpage')

@section('title')
	<title>照片</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/lib/css/swiper3.1.0.min.css">
	<link rel="stylesheet" href="/dist/css/userCenter/gallary/gallary.css">
@stop

@section('page-left-nav')
@stop

@section('page-content')
	<div id="mask" style="display:none;"></div>
	<div class="page-content" style="padding:0px;">
		<div class="photos">
			@foreach($photos as $photo)
			<div class="photo">
				<span class="delete-btn">×</span>
				<input type="hidden" class="id" value="{{ $photo->id }}" />
				<img src="{{ $photo->picture }}" width="236" height="195" />
			</div>
			@endforeach
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
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
		<div style="clear:both;"></div>
	</div>
@stop

@section('js')
	@parent
	<script type="text/javascript" src="/dist/js/lib/plugins/swiper.min.js"></script>
	<script type="text/javascript" src="/dist/js/pages/gallary.js"></script>
@stop