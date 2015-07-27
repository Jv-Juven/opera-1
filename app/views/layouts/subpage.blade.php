@extends('layouts.master')

@section('css')
	<link rel="stylesheet" href="/dist/css/components.css">
	<link rel="stylesheet" href="/dist/css/layouts.css">
@append

@section('body')
	@parent
	<div id="main" class="main">

		@yield('page-left-nav')
		@yield('page-content')
        <div class="clear"></div>

	</div>
@append

@section('js')
	
@append