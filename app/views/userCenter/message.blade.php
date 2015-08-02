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
			<input type="hidden" class="message-id" value="{{{ $message->id }}}" />
			<img class="avatar" src="{{{$message->avatar}}}" width="50" height="50" />
			<div class="message-info">
				<span class="name">{{{$message->sender}}}</span>
				<span class="time">{{{$message->created_at}}}</span>
			</div>
			<div class="content">
				<p>{{{$message->content}}}</p>
			</div>
			<div class="message-edit">
				<a href="javascript:void(0);" class="message-reply-btn">回复(<span class="message-comment-count">{{{$message->messageCommentCount}}}</span>)</a>|<a href="javascript:void(0);" class="message-delete-btn">删除</a>
			</div>
			<div class="replies">
				@foreach($message["comments"] as $comment)
				<div class="reply">
					<input type="hidden" class="comment-id" value="{{{ $comment['id'] }}}" />
					<img class="avatar" src="{{{ $comment['sender_avatar'] }}}" width="50" height="50" />
					<div class="reply-info">
						<span class="reply-author name">{{{ $comment["sender_name"] }}}</span>
						回复
						<span class="reply-author name" style="margin-left: 0px;">{{{ $comment["receiver_name"] }}}</span>
						<span class="reply-time time">{{{ $comment["created_at"] }}}</span>
						<a href="javascript:void(0);" class="reply-btn">回复</a>
					</div>
					<div class="reply-content">{{{ $comment["content"] }}}</div>
					<div style="clear:both;"></div>
				</div>
				@endforeach
				<div class="reply-input-wrapper">
					<input type="hidden" class="comment-id" value="" />
					<input type="hidden" class="message-id" value="" />
					<input type="hidden" class="comment-type" value="" />
					<textarea class="reply-input"></textarea>
					<input type="button" class="reply-submit-btn" value="提交" />
					<div style="clear:both;"></div>
				</div>
				<script type="text/template" id="message-comment-template">
					<div class="reply">
						<input type="hidden" class="comment-id" value="<%= id %>" />
						<img class="avatar" src="<%= avatar %>" width="50" height="50" />
						<div class="reply-info">
							<span class="reply-author name"><%= sender_name %></span>
							回复
							<span class="reply-author name" style="margin-left: 0px;"><%= receiver_name %></span>
							<span class="reply-time time"><%= created_at %></span>
							<a href="javascript:void(0);" class="reply-btn">回复</a>
						</div>
						<div class="reply-content"><%= content %></div>
						<div style="clear:both;"></div>
					</div>
				</script>
				<div style="clear:both;"></div>
			</div>
			<div style="clear:both;"></div>
		</div>
	@endforeach
	</div>
@stop

@section("js")
    @parent
    <script type="text/javascript" src="/lib/js/plugins/lodash.min.js"></script>
    <script type="text/javascript" src="/dist/js/pages/message.js"></script>
@stop