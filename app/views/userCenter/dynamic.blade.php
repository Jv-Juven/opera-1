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
										<a class="comment-reply-btn" href="javascript:void(0);">回复</a>
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
											<a class="reply-btn" href="javascript:void(0);">回复</a>
										</div>
									</div>
									<div style="clear:both;"></div>
								</div>
								@endforeach
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
											</div>
										</div>
										<div style="clear:both;"></div>
									</div>
								</script>
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
					</div>
				</p>
			</div>
		</div>
		@endforeach
	</div>
@stop

@section("js")
    @parent
    <script type="text/javascript" src="/lib/js/plugins/lodash.min.js"></script>
    <script type="text/javascript" src="/dist/js/pages/dynamic.js"></script>
@stop