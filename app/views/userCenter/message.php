@extend('layouts.subpage')


@section('title')
	<title>留言</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/userCenter/message/message.css">
@atop

@section('page-left-nav')
	@include('components.left-nav.userCenter-show-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		
	</div>
@stop