@extend('layouts.subpage')


@section('title')
	<title>个人资料</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/userCenter/information/information.css">
@atop

@section('page-left-nav')
	@include('components.left-nav.userCenter-show-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		
	</div>
@stop