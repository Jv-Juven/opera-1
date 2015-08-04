@extends('layouts.master')

@section('title')
<title>加入我们</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/join/join.css">
	<link rel="stylesheet" href="/lib/css/swiper3.1.0.min.css">
@stop

@section('body')
	@parent
	<div id="main" class="main">
		<div class="join-pic">
			<img src="/images/join/join_img.png" alt="">
		</div>
		<div class="join-container">
			<div class="join-left-sidebar">
				<div class="join-left-container">
					<span class="join-left-ch">加入我们</span>
					<span class="join-left-en">JOIN US</span>
				</div>
			</div>
			<div class="swiper-container join-swiper-container join-content">
				<!-- <div class="swiper-wrapper"> -->
					<ul class="swiper-wrapper">
					@if(isset($employments))
						@foreach($employments as $employment)
						<li class="swiper-slide">
							<span class="h1">{{$employment->title}}</span>
							<span class="join-details">{{$employment->content}}</span>
						</li>
						@endforeach
					@endif
					</ul>
				<!-- </div> -->
				
					
				<!-- 如果需要滚动条 -->
			    <div class="swiper-scrollbar join-scrollbar"></div>
			</div>
		</div>
	</div>
@stop

@section('js')
	@parent
	<script type="text/javascript" src="/dist/js/lib/plugins/swiper.min.js"></script>
	<script type="text/javascript" src="/dist/js/pages/join.js"></script>
@stop
