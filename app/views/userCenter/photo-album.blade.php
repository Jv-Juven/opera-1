@extend('layouts.subpage')


@section('title')
	<title>相册</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/userCenter/photo-album/photo-album.css">
@atop

@section('page-left-nav')
	@include('components.left-nav.userCenter-show-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		
	</div>
@stop