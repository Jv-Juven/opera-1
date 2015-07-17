@extend('layouts.subpage')


@section('title')
	<title>空间首页</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/userCenter/zone/zone.css">
@atop

@section('page-left-nav')
	@include('components.left-nav.userCenter-show-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		   
	</div>
@stop