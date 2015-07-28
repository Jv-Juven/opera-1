@extends('layouts.subpage')

@section('title')
	<title>启蒙专栏</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/communication/enlighten/enlighten.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.communication-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		<p id="title">{{$column->title}}</p>
		<p id="time">发布时间：{{$column->created_at}}</p>
		{{$column->content}}
	</div>
@stop

@section('js')
	@parent
	<!-- // <script type="text/javascript" src="/src/pages/communication/enlighten/enlighten.js"></script> -->
@stop