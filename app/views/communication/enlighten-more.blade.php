@extends('layouts.subpage')

@section('title')
	<title>启蒙专栏</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/communication/enlighten/enlighten.css">
	<link rel="stylesheet" href="/dist/css/communication/masterdynamic/masterdynamic.css">

@stop

@section('page-left-nav')
	@include('components.left-nav.communication-left-nav')
@stop

@section('page-content')
    <div class="page-content">
	    <div class="masterdynamic-title text-center">{{$column->title}}</div>
	    <div class="masterdynamic-subhead text-center">发布时间：{{$column->created_at}}</div>
	    <div class="masterdynamic-body">
	    	{{$column->content}}
	    </div>
    </div>
@stop

@section('js')
	@parent
	<!-- // <script type="text/javascript" src="/src/pages/communication/enlighten/enlighten.js"></script> -->
@stop