@extends('layouts.subpage')

@section('title')
	<title>协会表演</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/communication/enlighten/enlighten.css">
	<link rel="stylesheet" href="/dist/css/home/society-show/comedy/comedy.css">
	<link rel="stylesheet" href="/dist/css/home/society-show/comedy/comedy-details.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.home.society-show-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		<div class="figures-container clearx comedy-details-container">

			<div class="figures-content">
				<img src="/images/home/{{$teacher->avatar}}" alt="">
				<span class="figures-name-container">
					{{{$teacher->position}}}
					<span class="figures-name">{{{$teacher->chinese_name}}}</span>
				</span>
			</div>

			<ul class="figures-info">
				<li class="figures-info-tr">中文名：<span class="figures-info-name">{{{$teacher->chinese_name}}}</span></li>
				<li class="figures-info-tr">外文名：<span class="figures-info-name">{{{$teacher->foreign_name}}}</span></li>
				<li class="figures-info-tr">国籍：<span class="figures-info-name">{{{$teacher->country}}}</span></li>
				<li class="figures-info-tr">民族：<span class="figures-info-name">{{{$teacher->nation}}}</span></li>
				<li class="figures-info-tr">出生地：<span class="figures-info-name">{{{$teacher->birthplace}}}</span></li>
				<li class="figures-info-tr">职业：<span class="figures-info-name">{{{$teacher->position}}}</span></li>
				<li class="figures-info-tr">社会公职：<span class="figures-info-name">{{{$teacher->social_post}}}</span></li>
				<li class="figures-info-tr">代表作品：<span class="figures-info-name">{{{$teacher->production}}}</span></li>
			</ul>

			<div class="figures-division-line"></div>

			<div class="figures-intro">
				<div class="figures-intro-head">简介</div>
				<ul class="figures-intro-content">
					<li>
						1994年
						<div>{{{$teacher->per_description}}}</div>
					</li>
					<div class="figures-intro-division"></div>
					<div class="figures-intro-division"></div>
				</ul>
			</div>



		</div>
	</div>
@stop

