@extends('layouts.subpage')


@section('title')
	<title>留言</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/userCenter/message/message.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.userCenter-left-nav')
@stop

@section('page-content')
	@foreach($messages as $message)
	<div class="page-content">
		<div class="image">
			<img src="{{{$message->avatar}}}">
		</div>
		<div>
			<p><span class= "name">{{{$message->sender}}}</span><span class ="time">{{{$message->created_at}}}</span></p>
		</div>
		<div class="content">
			<p>{{{$message->content}}}</p>
		</div>
		<div class="message-btn">
			<p class="message-edit"><span class= "reply-btn">回复({{{$message->messageCommentCount}}})</span>|<span class = "delete-btn">删除</span></p>
		</div>

	</div>
	@endforeach

	
@stop


@section("js")
    @parent
@stop