@extends('layouts.subpage');

@section('title')
	<title>台前幕后</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/communication/enlighten/enlighten.css">
	<!-- <link rel="stylesheet" href="/dist/css/home/society-show/comedy/before-behind.css"> -->
	<link rel="stylesheet" href="/dist/css/communication/masterdynamic/masterdynamic.css">
@stop


@section('page-left-nav')
	@include('components.left-nav.home.society-show-left-nav')
@stop

@section('page-content')
    <div class="page-content">
	    <div class="masterdynamic-title text-center">{{$backstage->title}}</div>
	    <div class="masterdynamic-subhead text-center">发布时间：{{$backstage->created_at}}</div>
	    <div class="masterdynamic-body">
	    	{{$backstage->content}}
	    </div>
    </div>
@stop

@section('js')
	@parent
	<!-- // <script type="text/javascript" src="/src/pages/communication/masterdynamic/masterdynamic.js"></script> -->
@stop