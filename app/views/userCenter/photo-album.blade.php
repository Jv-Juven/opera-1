@extends('layouts.subpage')


@section('title')
	<title>相册</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/userCenter/photo-album/photo-album.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.userCenter-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		<div class="album-container clearx">

			<div class="album-box">
				<img src="images/userCenter/album.png" alt="">
				<div class="album-content">
					<span class="album-name">社会活动</span>
					<span class="album-pics">图片数：<span class="count">3</span></span>
				</div>
			</div>

			<div class="album-box">
				<img src="images/userCenter/album.png" alt="">
				<div class="album-content">
					<span class="album-name">社会活动</span>
					<span class="album-pics">图片数：<span class="count">3</span></span>
				</div>
			</div>

			<div class="album-box">
				<img src="images/userCenter/album.png" alt="">
				<div class="album-content">
					<span class="album-name">社会活动</span>
					<span class="album-pics">图片数：<span class="count">3</span></span>
				</div>
			</div>

			<div class="album-box">
				<img src="images/userCenter/album.png" alt="">
				<div class="album-content">
					<span class="album-name">社会活动</span>
					<span class="album-pics">图片数：<span class="count">3</span></span>
				</div>
			</div>

			<div class="album-box">
				<img src="images/userCenter/album.png" alt="">
				<div class="album-content">
					<span class="album-name">社会活动</span>
					<span class="album-pics">图片数：<span class="count">3</span></span>
				</div>
			</div>

			<div class="album-box">
				<img src="images/userCenter/album.png" alt="">
				<div class="album-content">
					<span class="album-name">社会活动</span>
					<span class="album-pics">图片数：<span class="count">3</span></span>
				</div>
			</div>

			<div class="album-box">
				<img src="images/userCenter/album.png" alt="">
				<div class="album-content">
					<span class="album-name">社会活动</span>
					<span class="album-pics">图片数：<span class="count">3</span></span>
				</div>
			</div>
			
		</div>

		<div class="album-division-hr"></div>

		<div class="album-paging">
			<span class="album-Pre">
				<img src="images/userCenter/pre_page.png" alt="">
				<span class="album-paging-text">上一页</span>
			</span>
			<span class="album-Next">
				<img src="images/userCenter/next_page.png" alt="">
				<span class="album-paging-text">下一页</span>
			</span>
		</div>

	</div>
@stop