@extends('layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="/dist/css/admin/layout.css">
@append

@section('body')
    @parent
    <div id="main">
        @include('admin-header-nav')
        
        @include('admin-left-nav')

        @yield('admin-header-nav')

        @yield('admin-content')

        <div class="clear"></div>
    </div>
@append

@section('js')
	
@append
