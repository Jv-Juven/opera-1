@extends('layouts.subpage')

@section("title")
	<title>协会动态</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/communication/enlighten/enlighten.css">
	<link rel="stylesheet" href="/dist/css/communication/societydynamic/societydynamic.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.communication-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		<p id="title">{{$association->title}}</p>
		<p id="time">发布时间：{{$association->created_at}}</p>
		{{$association->content}}
	</div>
@stop


@section('js')
	@parent
	<!-- // <script type="text/javascript" src="/src/pages/communication/societydynamic/societydynamic.js"></script> -->
@stop