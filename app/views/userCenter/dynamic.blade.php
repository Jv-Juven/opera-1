@extend('layouts.subpage')


@section('title')
	<title>话题动态</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/userCenter/dynamic/dynamic.css">
@atop

@section('page-left-nav')
	@include('components.left-nav.userCenter-show-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		
	</div>
@stop