@extends('layouts.subpage')

@section('title')
	<title>经典欣赏</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/communication/enlighten/enlighten.css">
	<link rel="stylesheet" href="/dist/css/home/society-show/comedy/classic-case.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.home.society-show-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		<div class="classic-container clearx">
		@if($appreciations != null)
			@foreach($appreciations as $appreciation)
			<div class="classic-content">
				<img src="/images/admin/classic/{{$appreciation->video_img}}" data-id="{{$appreciation->id}}" alt="">
				<span class="classic-name-container">
					戏剧
					<span class="classic-name">{{$appreciation->title}}</span>
				</span>
			</div>
			@endforeach
		@endif
		</div>
		<!-- <ul class="enlighten-subpage-plugin classic-footer">
			<li><a href="javascript:">首页</a></li>
			<li><a href="javascript:">1</a></li>
			<li><a href="javascript:">2</a></li>
			<li><a href="javascript:">...</a></li>
			<li><a href="javascript:">...</a></li>
			<li><a href="javascript:">20</a></li>
			<li><a href="javascript:">下一页</a></li>
			<li><a href="javascript:">末页</a></li>
			<li>共<span class="enlighten-pages">2</span>页</li>
		</ul> -->
	</div>
	<div id="case_video" class="full-screen">
		<!-- <iframe height=498 width=510 src="" frameborder=0 allowfullscreen></iframe> -->
		<!-- <img class="video-close" src="/images/common/close_btn.png"> -->
	</div>
@stop

@section('js')
	@parent
	<script type="text/javascript" src="/dist/js/pages/classic-case.js"></script>
@stop