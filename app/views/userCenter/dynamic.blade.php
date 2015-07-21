@extends('layouts.subpage')


@section('title')
	<title>话题动态</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/userCenter/dynamic/dynamic.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.userCenter-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		<div class="com">
			<div>
				<p class="title">生活点滴相关<span class="time">2014-4-20</span></p>
			</div>

			<div>
				<p class="content">生活点滴相关生活点滴相关生活点滴相关生活点滴相关生活点滴相关</p>
			</div>

			<div>
				<p class="comment">
				<a href="test">
					<img src="images/userCenter/comment.png">
				
					<span class ="comment-count">(<span class= "number">10</span>)个评论</span>
				</a>
				</p>
			</div>
		</div>

		<div class="com">
			<div>
				<p class="title">生活点滴相关<span class="time">2014-4-20</span></p>
			</div>

			<div>
				<p class="content">生活点滴相关生活点滴相关生活点滴相关生活点滴相关生活点滴相关</p>
			</div>

			<div>
				<p class="comment">
				<a href="test">
					<img src="images/userCenter/comment.png">
				
					<span class ="comment-count">(<span class= "number">10</span>)个评论</span>
				</a>
				</p>
			</div>
		</div>
	</div>
@stop