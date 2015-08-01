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
				<a href="javascript:void(0);" class="message-reply-btn">回复({{{$message->messageCommentCount}}})</a>|<a href="javascript:void(0);" class="message-delete-btn">删除</a>
			</div>
			<div class="replies">
				@foreach($message["comments"] as $comment)
				<div class="reply">
					<img class="avatar" src="" width="50" height="50" />
					<div class="reply-info">
						<span class="reply-author name">{{{ $comment["sender_name"] }}}</span>
						回复
						<span class="reply-author name">{{{ $comment["receiver_name"] }}}</span>
						<span class="reply-time time">{{{ $comment["created_at"] }}}</span>
						<a href="javascript:void(0);" class="reply-btn">回复</a>
					</div>
					<div class="reply-content">{{{ $comment["content"] }}}</div>
					<div style="clear:both;"></div>
				</div>
				@endforeach
				<div class="reply-input-wrapper">
					<textarea class="reply-input"></textarea>
					<input type="button" class="reply-submit-btn" value="提交" />
					<div style="clear:both;"></div>
				</div>
				<div style="clear:both;"></div>
			</div>
			<div class="message-reply-input-wrapper">
				<textarea class="reply-input"></textarea>
				<input type="button" class="message-reply-submit-btn" value="提交" />
				<div style="clear:both;"></div>
			</div>
			<div style="clear:both;"></div>
		</div>
	@endforeach
	</div>
@stop

@section("js")
    @parent
    <script type="text/javascript" src="/dist/js/pages/message.js"></script>
@stop