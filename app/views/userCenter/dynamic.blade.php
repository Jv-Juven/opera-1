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

					<div class="comments">
						@foreach($topic->comments as $comment)
						<div class="comment">
							<div class="comment-item">
								<img class="author-avatar" src="http://7sbxao.com1.z0.glb.clouddn.com/login.jpg" width="50" height="50" />
								<div class="commment-info"> 
									<span class="author-name">{{{ $comment["author_name"] }}}</span>
								 	 ： 
									<span class="comment-content">{{{ $comment["content"] }}}</span>
									<div class="comment-operate">
										<span class="comment-time">{{{ $comment["created_at"] }}}</span>
										<a class="comment-reply-btn" href="javascript:void(0);">回复</a>
									</div>
								</div>
								<div class="comment-input-wrapper">
									<textarea class="reply-input"></textarea>
									<input type="button" class="comment-reply-submit-btn" value="提交" />
								</div>
								<div style="clear:both;"></div>
							</div>
							<div class="replies">
								@foreach($comment["replies"] as $reply)
								<div class="reply">
									<img class="author-avatar" src="http://7sbxao.com1.z0.glb.clouddn.com/login.jpg" width="50" height="50" />
									<div class="reply-info"> 
										<span class="author-name">{{{ $reply->sender_name }}}</span>
										回复
										<span class="author-name">{{{ $reply->receiver_name }}}</span>

									 	 ： 
										<span class="reply-content">{{{ $reply->content }}}</span>
										<div class="reply-operate">
											<span class="reply-time">{{{ $reply->created_at }}}</span>
											<!-- <span class="reply-time">7月6日 19:36</span> -->
											<a class="reply-btn" href="javascript:void(0);">回复</a>
										</div>
									</div>
									<div style="clear:both;"></div>
								</div>
								@endforeach
								<div class="reply-input-wrapper">
									<textarea class="reply-input"></textarea>
									<input type="button" class="reply-submit-btn" value="提交" />
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
    <script type="text/javascript" src="/dist/js/pages/dynamic.js"></script>
@stop