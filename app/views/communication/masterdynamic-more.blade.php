@extends("layouts.subpage")

@section('title')
	<title>学会动态</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/communication/enlighten/enlighten.css">
	<link rel="stylesheet" href="/dist/css/communication/masterdynamic/masterdynamic.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.communication-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		<p id="title">{{$society->title}}</p>
		<p id="time">发布时间：{{$society->created_at}}</p>
		{{$society->content}}
	</div>
@stop

@section('js')
	@parent
	<!-- // <script type="text/javascript" src="/src/pages/communication/masterdynamic/masterdynamic.js"></script> -->
@stop