@extends('admin.layout')

@section('title')
    <title>后台管理－轮播海报</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/admin/home/scroll-poster.css">
@stop

@section('admin-header-nav')
    @include('components.admin-header-nav.home-header-nav')
@stop

@section('admin-content')
	<div class="home-content admin-content">
		
	</div>
@stop

@section('js')
	@parent
    <script type="text/javascript" src='/dist/js/pages/admin/home/scroll-poster.js'></script>
@stop
