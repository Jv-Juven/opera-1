@extends('layouts.subpage')

@section('title')
	<title>协会表演</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/communication/enlighten/enlighten.css">
	<link rel="stylesheet" href="/dist/css/home/society-show/comedy/comedy.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.home.society-show-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		<div class="figures-container clearx">

			<div class="figures-content">
				<img src="./images/home/comedy_head.png" alt="">
				<span class="figures-name-container">
					戏剧家
					<span class="figures-name">朱茵</span>
				</span>
			</div>

			<div class="figures-content">
				<img src="./images/home/comedy_head.png" alt="">
				<span class="figures-name-container">
					戏剧家
					<span class="figures-name">朱茵</span>
				</span>
			</div>

			<div class="figures-content">
				<img src="./images/home/comedy_head.png" alt="">
				<span class="figures-name-container">
					戏剧家
					<span class="figures-name">朱茵</span>
				</span>
			</div>

			<div class="figures-content">
				<img src="./images/home/comedy_head.png" alt="">
				<span class="figures-name-container">
					戏剧家
					<span class="figures-name">朱茵</span>
				</span>
			</div>

			<div class="figures-content">
				<img src="./images/home/comedy_head.png" alt="">
				<span class="figures-name-container">
					戏剧家
					<span class="figures-name">朱茵</span>
				</span>
			</div>

			<div class="figures-content">
				<img src="./images/home/comedy_head.png" alt="">
				<span class="figures-name-container">
					戏剧家
					<span class="figures-name">朱茵</span>
				</span>
			</div>


		</div>
		<ul class="enlighten-subpage-plugin figures-footer">
			<li><a href="javascript:">首页</a></li>
			<li><a href="javascript:">1</a></li>
			<li><a href="javascript:">2</a></li>
			<li><a href="javascript:">...</a></li>
			<li><a href="javascript:">...</a></li>
			<li><a href="javascript:">20</a></li>
			<li><a href="javascript:">下一页</a></li>
			<li><a href="javascript:">末页</a></li>
			<li>共<span class="enlighten-pages">2</span>页</li>
		</ul>
	</div>
@stop

