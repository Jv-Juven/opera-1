@extends('layouts.subpage')


@section('title')
	<title>相册</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/lib/css/swiper3.1.0.min.css">
	<link rel="stylesheet" href="/dist/css/userCenter/photo-album/photo-album.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.userCenter-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		<div class="album-container clearx">
			@foreach($albums as $album)
			<div class="album-box">
				<img src="{{{$album->picture}}}" alt="">
				<div class="album-content">
					<span class="album-name">{{{$album->title}}}</span>
					<span class="album-pics">图片数：<span class="count">{{{$album->albumCount}}}</span></span>
				</div>
			</div>
			@endforeach
		</div>

		<div class="album-division-hr"></div>

		<div class="album-paging">
			<span class="album-Pre">
				<img src="/images/userCenter/pre_page.png" alt="">
				<span class="album-paging-text">上一页</span>
			</span>
			<span class="album-Next">
				<img src="/images/userCenter/next_page.png" alt="">
				<span class="album-paging-text">下一页</span>
			</span>
		</div>

	</div>
	<div class="full-screen">
		<div class="swiper-containter photo-album-swiper">
			<div class="swiper-wrapper">
				<div class="swiper-slider">
					<img src="/images/userCenter/album01.png" alt="">
				</div>
				<div class="swiper-slider">
					<img src="/images/userCenter/album02.png" alt="">
				</div>
				<div class="swiper-slider">
					<img src="/images/userCenter/album03.png" alt="">
				</div>
			</div>
		</div>

		<!-- 如果需要导航按钮 -->
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
		
	</div>
@stop

@section('js')
	@parent
	<script type="text/javascript" src="/dist/js/lib/plugins/swiper3.1.0.jquery.min.js"></script>
@stop