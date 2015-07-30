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
		<ul class="enlighten-list">
		@foreach($columns as $column)
			<li><a href="/customer/news/column_more?column_id={{{$column->id}}}">{{$column->title}}<span class="enlighten-list-date">{{$column->created_at}}</span></a></li>
		@endforeach
		</ul>
		{{$columns->links()}}
		<!-- <ul class="enlighten-subpage-plugin">
			<li><a href="javascript:">首页</a></li>
			<li><a href="javascript:">1</a></li>
			<li><a href="javascript:">2</a></li>
			<li><a href="javascript:">末页</a></li>
			<li>共<span class="enlighten-pages">{{$page}}</span>页<span class="enlighten-items">{{$column_count}}</span>条</li>
		</ul> -->
	</div>
@stop

@section('js')
	@parent
	// <!-- <script type="text/javascript" src="/dist/js/pages/enlighten.js"></script> -->
@stop