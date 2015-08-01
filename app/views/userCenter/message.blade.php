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
	<div class="page-content">
	@foreach($messages as $message)
		<div class="message">
			<img class="avatar" src="{{{$message->avatar}}}" width="50" height="50" />
			<div class="message-info">
				<span class="name">{{{$message->sender}}}</span>
				<span class="time">{{{$message->created_at}}}</span>
			</div>
			<div class="content">
				<p>{{{$message->content}}}</p>
			</div>
			<div class="message-edit">
				<span class= "reply-btn">回复({{{$message->messageCommentCount}}})</span>|<span class = "delete-btn">删除</span>
			</div>
			<div class="replies">
				<div class="reply">
					<img class="avatar" src="{{{$message->avatar}}}" width="50" height="50" />
					<div class="reply-info">
						<span class="reply-author name">王晓明</span>
						<span class="reply-time time">2015-07-31 13:38:08</span>
						<a href="javascript:void(0);" class="reply-btn">回复</a>
					</div>
					<div class="reply-content">
						其实不应该是这样的，你完全不理解戏曲的重要性，我们做的是什么，热爱，对生活的向往，向阳！
						其实不应该是这样的，你完全不理解戏曲的重要性，我们做的是什么，热爱，对生活的向往，向阳！
						其实不应该是这样的，你完全不理解戏曲的重要性，我们做的是什么，热爱，对生活的向往，向阳！
						其实不应该是这样的，你完全不理解戏曲的重要性，我们做的是什么，热爱，对生活的向往，向阳！
					</div>
					<div style="clear:both;"></div>
				</div>
				<div class="reply">
					<img class="avatar" src="{{{$message->avatar}}}" width="50" height="50" />
					<div class="reply-info">
						<span class="reply-author name">王晓明</span>
						<span class="reply-time time">2015-07-31 13:38:08</span>
						<a href="javascript:void(0);" class="reply-btn">回复</a>
					</div>
					<div class="reply-content">
						其实不应该是这样的，你完全不理解戏曲的重要性，我们做的是什么，热爱，对生活的向往，向阳！
						其实不应该是这样的，你完全不理解戏曲的重要性，我们做的是什么，热爱，对生活的向往，向阳！
						其实不应该是这样的，你完全不理解戏曲的重要性，我们做的是什么，热爱，对生活的向往，向阳！
						其实不应该是这样的，你完全不理解戏曲的重要性，我们做的是什么，热爱，对生活的向往，向阳！
					</div>
					<div style="clear:both;"></div>
				</div>
				<div style="clear:both;"></div>
			</div>
			<div style="clear:both;"></div>
		</div>
	@endforeach
	</div>
@stop


@section("js")
    @parent
@stop