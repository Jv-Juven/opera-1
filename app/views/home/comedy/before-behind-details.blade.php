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
        <p id="title">{{$backstage->title}}</p>
        <p id="time">发布时间：{{$backstage->created_at}}</p>
        {{$backstage->content}}
    </div>
@stop