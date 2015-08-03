@extends('layouts.master')

@section('title')
<title>加入我们</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/join/join.css">
@stop

@section('body')
	@parent
	<div id="main" class="main">
		<div class="join-pic">
			<img src="/images/join/join_img.png" alt="">
		</div>
		<div class="join-container">
			<div class="join-left-sidebar">
				<div class="join-left-container">
					<span class="join-left-ch">加入我们</span>
					<span class="join-left-en">JOIN US</span>
				</div>
			</div>
			<div class="join-content clearx">
				<ul>
				@if(isset($employments))
					@foreach($employments as $employment)
					<li>
						<span class="h1">{{$employment->title}}</span>
						<span class="join-details">{{$employment->content}}</span>
					</li>
					@endforeach
				@endif
				</ul>
			</div>
		</div>
	</div>
@stop

@section('js')
	@parent
	<!-- // <script type="text/javascript" src="/src/pages/join/join.js"></script> -->
@stop
