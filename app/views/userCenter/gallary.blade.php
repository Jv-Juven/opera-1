@extends('layouts.subpage')

@section('title')
	<title>照片</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/lib/css/swiper3.1.0.min.css">
	<link rel="stylesheet" href="/dist/css/userCenter/photo-album/gallary.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.userCenter-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		
	</div>
@stop

@section('js')
	@parent
	<script type="text/javascript" src="/dist/js/lib/plugins/swiper.min.js"></script>
	<script type="text/javascript" src="/dist/js/pages/gallary.js"></script>
@stop