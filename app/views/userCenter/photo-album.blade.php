@extends('layouts.subpage')


@section('title')
	<title>相册</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/communication/enlighten/enlighten.css">

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
			<div class="album-box album-box-finished" data-id="{{$album->id}}">
				<a href="/user/gallary?album_id={{{ $album->id }}}&&user_id={{{ $user->id }}}">
					<img src="{{{$album->picture}}}" alt="">
				</a>
				<div class="album-content">
					<span class="album-name noedit-name">{{{$album->title}}}</span>
					<input class="album-name edit-name" type="text" value="{{{$album->title}}}" />
				</div>
				<div class="album-oprate">
					<span class="album-pics">图片数：<span class="count">{{{$album->albumCount}}}</span></span>
					<span class="album-edit">编辑</span>
					<span class="album-del">删除</span>
				</div>
			</div>
			@endforeach
			<div class="album-box album-box-add" data-id="">
				<div class="album-box-add-sign">+</div>
				<div class="album-box-add-text">创建新相册</div>
			</div>
		</div>
		<div class="album-division-hr"></div>
		{{$albums->links()}}

		<!-- <div class="album-paging">
			<span class="album-Pre">
				<img src="/images/userCenter/pre_page.png" alt="">
				<span class="album-paging-text">上一页</span>
			</span>
			<span class="album-Next">
				<img src="/images/userCenter/next_page.png" alt="">
				<span class="album-paging-text">下一页</span>
			</span>
		</div> -->
	</div>
	<div class="full-screen album-full-screen" style="">

		<!-- <div class="swiper-containter photo-album-swiper">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<img src="" alt="">
				</div>
				<div class="swiper-slide">
					<img src="/images/userCenter/album03.png" alt="">
				</div> 
			</div>
		</div> -->

		<!-- 如果需要导航按钮 -->
		<!-- <div class="swiper-button-prev"></div> -->
		<!-- <div class="swiper-button-next"></div> -->
		<!-- <div class="video-close">×</div> -->
	</div>

	<div class="screen-cover-box">
		<div class="box-header">创建相册</div>
		<div class="box-body">
			<div class="box-content">
				<div class="box-input-field">
					<span class="box-input-title">相册名称：</span> 
					<input id="album_name_input" class="box-input" type="text" />
					<span class="box-input-percent">0/15</span>
				</div>
				<div id="box_btn_container" class="box-btn-container">
					<div class="box-btn">上传图片</div>
						<div class="box-btn box-upload-btn">
							<input id="box_btn" class="box-btn-file" type="file" />
						</div>
					</div>
					
			</div>
		</div>
	</div>
@stop

@section('js')
	@parent
	<script type="text/javascript" src="/dist/js/lib/plugins/swiper.min.js"></script>
    <script type="text/javascript" src="/dist/js/lib/plugins/qiniu.min.js"></script>
    <script type="text/javascript" src="/dist/js/lib/plugins/plupload.full.min.js"></script>
	<script type="text/javascript" src="/dist/js/pages/photo-album.js"></script>
@stop