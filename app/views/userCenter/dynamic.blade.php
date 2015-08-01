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
	@if(isset($topics))
		@foreach($topics as $topic)
		<div class="topic">
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
			@if($topic->comments != null)
					<!-- 遍历话题评论 -->
				
					@foreach($topic->comments as $comment)
						@if( $comment != null)
					<div class="comments">
						<div class="comment">
							<div class="comment-item">
								<img class="author-avatar" src="{{User::find($comment->user_id)->avatar}}" width="50" height="50" />
								<div class="commment-info"> 
									<span class="author-name">{{User::find($comment->user_id)->username}}</span>
								 	 ： 
									<span class="comment-content">{{$comment->content}}</span>
									<div class="comment-operate">
										<span class="comment-time">{{$comment->created_at}}</span>
										<a class="reply-btn" href="javascript:void(0);">回复</a>
									</div>
								</div>
								<div class="comment-input-wrapper">
									<textarea class="reply-input"></textarea>
									<input type="button" class="reply-submit-btn" value="提交" />
								</div>
								<div style="clear:both;"></div>
							</div>
							@if($comment->replys != null)
							<div class="replies">
								@foreach($comment->replys as $reply)
									@if($reply != null)
								<div class="reply">
									<img class="author-avatar" src="{{User::find($reply->sender_id)->avatar}}" width="50" height="50" />
									<div class="reply-info"> 
										<span class="author-name">{{User::find($reply->sender_id)->username}}</span>
									 	 ： 
										<span class="reply-content">{{$reply->content}}</span>
										<div class="reply-operate">
											<span class="reply-time">{{$reply->created_at}}</span>
											<a class="reply-btn" href="javascript:void(0);">回复</a>
										</div>
									</div>
									<div style="clear:both;"></div>
								</div>
									@endif
								@endforeach
							</div>									
							@endif
						</div>
					</div>
						@endif
					@endforeach
				
			@endif
				</p>
			</div>
		</div>
		@endforeach
	@endif
	</div>
@stop

@section("js")
    @parent
    <script type="text/javascript" src="/dist/js/pages/dynamic.js"></script>
@stop