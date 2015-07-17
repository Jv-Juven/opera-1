@extends('layouts.subpage')

@section('title')
	<title>话题论谈</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/communication/topics/topics.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.communication-left-nav')
@stop

@section('page-content')
<div class="page-content">
	<div class="seach-container">
		<input class="seach-input" type="text">
		<div class="seach-btn">发布话题</div>
	</div>
</div>
@stop


@section('js')
	@parent
@stop