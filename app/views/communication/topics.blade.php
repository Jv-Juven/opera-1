@extends('layouts.subpage')

@section('title')
	<title>话题论谈</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/communication/topics/topic.css">
	<link rel="stylesheet" href="/lib/css/swiper3.1.0.min.css">

@stop

@section('page-left-nav')
	@include('components.left-nav.communication-left-nav')
@stop

@section('page-content')
<div id="topics_border01" class="page-content">
	<div class="seach-container clearx">
		<input class="seach-input" type="text">
		<div class="seach-btn">发布话题</div>
	</div>
	@if(isset($topic))
	<div class="topics-content">
		<input type="hidden" id="topic-id" value="{{ $topic->id }}">
		<div class="swiper-container topics-swiper">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="topics-items">
						<img src="{{$user->avatar}}">
						<div class="topics-right-content">
							<!-- 动态内容 -->
							<div class="topics-msg clearx">
								<div class="topics-name">{{$user->username}}</div>
								<div class="topics-title">{{$topic->title}}</div>
								<div class="topics-msg-body">
									{{$topic->content}}
								</div>
								<div class="topics-comment-delete">
									删除  
								</div>
								<div class="topics-comment">
									评论(<span>{{$commentCount}}</span>)  
								</div>
							</div>
							<!-- 评论区 -->
							<div class="topics-comments-container">
								<div class="comments">
									<!-- 一个用户的评论 -->
									@if(isset($topic_comments))
									@foreach($topic_comments as $topic_comment)
									<div class="comments-item">
										<input type="hidden" class="comment-id" value="{{ $topic_comment->id }}" />
										<div class="comments-avatar">
											<a href="javascript:">
												<img src="{{User::find($topic_comment->user_id)->avatar}}">
											</a>
										</div>
										<div class="item-head">
											<div class="item-title">{{User::find($topic_comment->user_id)->username}}</div>
											<a class="comment-delete-btn" href="javascript:void(0);">删除</a>
											<a class="comment-reply-btn" href="javascript:void(0);">回复</a>
											<span>{{$topic_comment->created_at}}</span>
										</div>
										<div class="item-body">{{$topic_comment->content}}</div>
										<div class="replies">
											@if(isset($comment_replys[$topic_comment->id]))
											@foreach($comment_replys[$topic_comment->id] as $reply)
											<div class="reply-containers clearx"> 
												<input type="hidden" class="reply-id" value="{{ $reply->id }}" />
												<div class="reply-avatar">
													<a href="javascript:void(0);">
														<img class="reply-avatar" src="{{User::find($reply->sender_id)->avatar}}" class="发表回复的头像">
													</a>
												</div>
												<div class="reply-content">
													<span class="reply-name">{{User::find($reply->sender_id)->username}}</span>
													<strong>回复</strong>
													<span class="reply-name">{{User::find($reply->receiver_id)->username}}</span>
													<span>：{{$reply->content}}</span>
												</div>
												<div class="reply-content reply-date">
													<span class="date">{{$reply->created_at}}</span>
													<a class="reply-btn" href="javascript:void(0);">回复</a>
													<a class="reply-delete-btn" href="javascript:void(0);">删除</a>
												</div>
											</div>
											@endforeach
											@endif
											<div class="reply-input-wrapper">
												<input type="hidden" class="topic-id" value="" />
												<input type="hidden" class="comment-id" value="" />
												<input type="hidden" class="reply-id" value="" />
												<input type="hidden" class="reply-type" value="" />
												<textarea class="reply-input"></textarea><br />
												<input type="button" class="reply-submit-btn" value="提交" />
												<div style="clear:both;"></div>
											</div>
										</div>
									</div>
									@endforeach
									@endif	
								</div>
								<div class="comment-input-wrapper">
									<textarea class="reply-input"></textarea><br />
									<input type="button" class="comment-submit-btn" value="提交" />
									<div style="clear:both;"></div>
								</div>
								<div class="comments-more">
									<div class="comment-btn">
										我要评论
									</div>
								</div>
							</div>		
						</div>
					</div>
				</div>
			</div>
			<!-- 如果需要滚动条 -->
		    <div class="swiper-scrollbar topics-scrollbar"></div>
		</div>
	</div>
	@endif
</div>
<div id="topics_border02" class="page-content" style="display:none">
	<div class="topics-publish">
		<div class="publish-container">
			<input class="topics-input" id="topics_title" type="text" placeholder="请输入主题">
			<div class="hr"></div>
			<textarea class="topics-input" name="topics_content" id="topics_content" cols="30" rows="10" placeholder="请输入内容"></textarea>
		</div>

		<div class="topics-publish-tr">
			<span class="topics-publish-btn">发布话题</span>
		</div>

	</div>
</div>

<script type="text/template" id="comment-template">
		<div class="comments-item">
			<input type="hidden" class="comment-id" value="<%= id %>" />
			<div class="comments-avatar">
				<a href="javascript:">
					<img src="<%= avatar %>">
				</a>
			</div>
			<div class="item-head">
				<div class="item-title"><%= author_name %></div>
				<a class="comment-reply-btn" href="javascript:void(0);">回复</a>
				<span><%= created_at %></span>
			</div>
			<div class="item-body"><%= content %></div>
			<div class="replies">
			<div class="reply-input-wrapper">
					<input type="hidden" class="topic-id" value="" />
					<input type="hidden" class="comment-id" value="" />
					<input type="hidden" class="reply-id" value="" />
					<input type="hidden" class="reply-type" value="" />
					<textarea class="reply-input"></textarea><br />
					<input type="button" class="reply-submit-btn" value="提交" />
					<div style="clear:both;"></div>
				</div>
			</div>
		</div>
</script>

<script type="text/template" id="comment-reply-template">
	<div class="reply-containers clearx"> 
		<input type="hidden" class="reply-id" value="<%= id %>" />
		<div class="reply-avatar">
			<a href="javascript:void(0);">
				<img class="reply-avatar" src="<%= sender_avatar %>" class="发表回复的头像">
			</a>
		</div>
		<div class="reply-content">
			<span class="reply-name"><%= sender_name %></span>
			<strong>回复</strong>
			<span class="reply-name"><%= receiver_name %></span>
			<span>：<%= content %></span>
		</div>
		<div class="reply-content reply-date">
			<span class="date"><%= created_at %></span>
			<a class="reply-btn" href="javascript:void(0);">回复</a>
		</div>
	</div>
</script>
@stop

@section('js')
	@parent
	<script type="text/javascript" src="/dist/js/lib/plugins/swiper.min.js"></script>
	<script type="text/javascript" src="/dist/js/lib/plugins/lodash.min.js"></script>
	<script type="text/javascript" src="/dist/js/pages/topics.js"></script>
@stop