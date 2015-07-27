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
		<ul class="enlighten-list">
			@foreach($associations as $association)
			<li><a href="javascript:">{{$association->title}}<span class="enlighten-list-date">{{$association->created_at}}</span></a></li>
			@endforeach
		</ul>
		{{$associations->links()}}
		<ul class="enlighten-subpage-plugin">
			<li><a href="javascript:">首页</a></li>
			<li><a href="javascript:">1</a></li>
			<li><a href="javascript:">2</a></li>
			<li><a href="javascript:">末页</a></li>
			<li>共<span class="enlighten-pages">{{$page}}</span>页<span class="enlighten-items">{{$association_count}}</span>条</li>
		</ul>
	</div>
@stop


@section('js')
	@parent
	<!-- // <script type="text/javascript" src="/src/pages/communication/societydynamic/societydynamic.js"></script> -->
@stop