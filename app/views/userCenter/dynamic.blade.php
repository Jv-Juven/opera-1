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
	<input type="hidden" id="receiver-id" value="{{{ $user->id }}}">
		@foreach($topics as $topic)
		<div class="topic">
			<input type="hidden" class="topic-id" value="{{{ $topic->id }}}" />
			<div>
				<p class="title">
					{{{$topic->title}}}
					<span class="time">{{{$topic->created_at}}}</span>
				</p>
			</div>
			<div>
				<p class="content">{{{$topic->content}}}</p>
			</div>
			<div>
				<p class="comment-wrapper">
					<a class="show-comments-btn" href="javascript:void(0);">
						<img src="/images/userCenter/comment.png">
					
						<span class="comment-count">
							(<span class="number">{{{$topic->commentsCount}}}</span>)个评论
						</span>
					</a>
					@if(Auth::check())
						@if(Auth::user()->id == $user->id)
					<a href="javascript:void(0);" class="del-comment-btn">删除话题</a>
						@endif
					<a href="javascript:void(0);" class="add-comment-btn">新增评论</a>
					@endif
					<!-- 遍历话题评论 -->
					<div class="comments">
						@foreach($topic->comments as $comment)
						<div class="comment">
							<input type="hidden" class="comment-id" value="{{{ $comment['id'] }}}" />
							<div class="comment-item">
								<img class="author-avatar" src="{{{ $comment['author_avatar'] }}}" width="50" height="50" />
								<div class="commment-info"> 
									<span class="author-name">{{{ $comment["author_name"] }}}</span>
									 ： 
									<span class="comment-content">{{{ $comment["content"] }}}</span>
									<div class="comment-operate">
										<span class="comment-time">{{{ $comment["created_at"] }}}</span>
									@if(Auth::check())	
										<a class="comment-reply-btn" href="javascript:void(0);">回复</a>
										@if(Auth::user()->id == $comment->user_id)	
										<a class="comment-del-btn" href="javascript:void(0);">删除</a>
										@endif
									@endif
									</div>
								</div>
								<div style="clear:both;"></div>
							</div>
							<div class="replies">
								@foreach($comment["replies"] as $reply)
								<div class="reply">
									<input type="hidden" class="reply-id" value="{{{ $reply->id }}}" />
									<img class="author-avatar" src="{{{ $reply->sender_avatar }}}" width="50" height="50" />
									<div class="reply-info"> 
										<span class="author-name">{{{ $reply->sender_name }}}</span>
										回复
										<span class="author-name">{{{ $reply->receiver_name }}}</span>
										 ： 
										<span class="reply-content">{{{ $reply->content }}}</span>
										<div class="reply-operate">
											<span class="reply-time">{{{ $reply->created_at }}}</span>
										@if(Auth::check())	
											<a class="reply-btn" href="javascript:void(0);">回复</a>
											@if(Auth::user()->id == $reply->sender_id)	
											<a class="del-reply-btn" href="javascript:void(0);">删除</a>
											@endif
										@endif
										</div>
									</div>
									<div style="clear:both;"></div>
								</div>
								@endforeach
								<div class="reply-input-wrapper">
									<input type="hidden" class="topic-id" value="" />
									<input type="hidden" class="comment-id" value="" />
									<input type="hidden" class="reply-id" value="" />
									<input type="hidden" class="reply-type" value="" />
									<textarea class="reply-input"></textarea>
									<input type="button" class="reply-submit-btn" value="提交" />
									<div style="clear:both;"></div>
								</div>
							</div>
						</div>
						@endforeach
						<div class="comment-input-wrapper">
							<input type="hidden" class="topic-id" value="" />
							<textarea class="reply-input"></textarea>
							<input type="button" class="comment-reply-submit-btn" value="提交" />
							<div style="clear:both;"></div>
						</div>
					</div>
				</p>
			</div>
		</div>
		@endforeach
	</div>

	<script type="text/template" id="comment-template">
		<div class="comment">
			<input type="hidden" class="comment-id" value="<%= id %>" />
			<div class="comment-item">
				<img class="author-avatar" src="<%= avatar %>" width="50" height="50" />
				<div class="commment-info"> 
					<span class="author-name"><%= author_name %></span>
					 ： 
					<span class="comment-content"><%= content %></span>
					<div class="comment-operate">
						<span class="comment-time"><%= created_at %></span>
						<a class="comment-reply-btn" href="javascript:void(0);">回复</a>
						<a class="comment-del-btn" href="javascript:void(0);">删除</a>
					</div>
				</div>
				<div style="clear:both;"></div>
			</div>
			<div class="replies">
				<div class="reply-input-wrapper">
					<input type="hidden" class="topic-id" value="" />
					<input type="hidden" class="comment-id" value="" />
					<input type="hidden" class="reply-id" value="" />
					<input type="hidden" class="reply-type" value="" />
					<textarea class="reply-input"></textarea>
					<input type="button" class="reply-submit-btn" value="提交" />
					<div style="clear:both;"></div>
				</div>
			</div>
		</div>
	</script>

	<script type="text/template" id="comment-reply-template">
		<div class="reply">
			<input type="hidden" class="reply-id" value="<%= id %>" />
			<img class="author-avatar" src="<%= sender_avatar %>" width="50" height="50" />
			<div class="reply-info"> 
				<span class="author-name"><%= sender_name %></span>
				回复
				<span class="author-name"><%= receiver_name %></span>
				 ： 
				<span class="reply-content"><%= content %></span>
				<div class="reply-operate">
					<span class="reply-time"><%= created_at %></span>
					<a class="reply-btn" href="javascript:void(0);">回复</a>
					<a class="del-reply-btn" href="javascript:void(0);">删除</a>
				</div>
			</div>
			<div style="clear:both;"></div>
		</div>
	</script>
@stop

@section("js")
	@parent
	<script type="text/javascript" src="/lib/js/plugins/lodash.min.js"></script>
	<script type="text/javascript" src="/dist/js/pages/dynamic.js"></script>
@stop