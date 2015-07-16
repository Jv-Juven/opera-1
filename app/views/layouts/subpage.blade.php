@extends('layouts.master')

@section('css')
	<link rel="stylesheet" href="/dist/css/subpage.css">
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
	@parent
@append