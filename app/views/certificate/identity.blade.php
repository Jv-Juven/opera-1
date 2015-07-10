@extends('layouts.subpage')

@section('title')
	<title>身份标志分类</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/certificate/identity.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.certificate-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		<div class="identity-nav-container">
			<ul>
				<li class="active"><a class="a" href="javascript:">全部</a></li>
				<li><a class="a" href="javascript:">全部</a></li>
				<li><a class="a" href="javascript:">全部</a></li>
				<li><a class="a" href="javascript:">全部</a></li>
				<li><a class="a" href="javascript:">全部</a></li>
				<li><a class="a" href="javascript:">全部</a></li>
			</ul>
		</div>
	</div>
@stop

@section('js')
	@parent
	<script type="text/javascript" src="/dist/js/pages/certificate/identity.js"></script>
@stop