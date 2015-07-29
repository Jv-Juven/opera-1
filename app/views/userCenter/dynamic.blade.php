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
		@foreach($topics as $topic)
		<div class="com">
			<div>
				<p class="title">{{{$topic->title}}}<span class="time">{{{$topic->created_at}}}</span></p>
			</div>

			<div>
				<p class="content">{{{$topic->content}}}</p>
			</div>

			<div>
				<p class="comment">
				<a href="test">
					<img src="/images/userCenter/comment.png">
				
					<span class ="comment-count">(<span class= "number">{{{$topic->commentsCount}}}</span>)个评论</span>
				</a>
				</p>
			</div>
		</div>
		@endforeach

	</div>
@stop

@section("js")
    @parent
@stop