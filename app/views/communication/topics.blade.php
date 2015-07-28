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
		<div class="swiper-container topics-swiper">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="topics-items">
						<img src="{{$user->avatar}}">
						<div class="topics-right-content">
							<!-- 动态内容 -->
							<div class="topics-msg">
								<div class="topics-name">{{$user->username}}</div>
								<div class="topics-title">{{$topic->title}}</div>
								<div class="topics-msg-body">
									{{$topic->content}}
								</div>
								<div class="topics-comment">
									评论（<span>{{$commentCount}}</span>）
								</div>
							</div>
							<!-- 评论区 -->
							<div class="topics-comments-container">
								<!-- 一个用户的评论 -->
								@foreach($topic_comments as $topic_comment)
								<div class="comments-item">
									<div class="item-head">
										<div class="item-title">{{$comment_name[$topic_comment->user_id]}}</div>
										<span class="comments-item-comment">评论</span>
										<span>{{$topic_comment->created_at}}</span>
										
									</div>
									<div class="item-body">{{$topic_comment->content}}</div>
								</div>
								@endforeach
								
								<!-- 更多评论 -->
								<div class="commonts-more">

									<div class="commont">
										我要评论
									</div>
									<div class="more">
										更多评论
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
</div>
	@endif
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
@stop


@section('js')
	@parent
	<script type="text/javascript" src="/dist/js/lib/plugins/swiper.min.js"></script>
	<script type="text/javascript" src="/dist/js/pages/topics.js"></script>
@stop