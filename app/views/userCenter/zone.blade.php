@extends('layouts.subpage')


@section('title')
	<title>空间首页</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/userCenter/zone/zone.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.userCenter-left-nav')
@stop

@section('page-content')
	<div class="page-content">
	   <div class="zone-container clearx">

		   <div class="clearx zone-line-container">
		   	
		   	   	<div class="zone-header">
		   	   		<div class="zone-banner">头像</div>
		   	   		<a href="/" class="zone-content">
		   	   			<img src="{{$user->avatar}}" alt="">
		   	   			<div class="zone-header-info clearx">
		   	   				<span class="zone-header-name">{{$user->realname}}</span>
		   	   				<span class="zone-header-org">{{$user->city}}</span>
		   	   			</div>
		   	   		</a>
		   	   	</div>

		   	   	<div class="zone-info">
		   	   		<div class="zone-banner">个人资料</div>
		   	   		<div class="zone-content">
		   	   			<div class="zone-info-line">
		   	   				<span class="name">真实姓名：
		   		   				<span>{{$user->realname}}</span>
		   	   				</span>
		   	   				<span class="sex">性别：
		   	   				@if($user->gender == 1)
		   		   				<span>女</span>
							@elseif ($user->gender == 0)
								<span>男</span>
							@elseif ($user->gender == 2)
								<span></span>
							@endif
		   	   				</span>
		   	   			</div>
		   	   			<div class="zone-info-intro clearx">
		   	   				<div class="intro-box intro-box01">我的简介：</div>
		   	   				<div class="intro-box intro-box02">
		   		   				<span class="intro-box-content">
		   		   					{{$user->per_description}}
		   		   				</span>
		   		   				
		   		   				<div class="more">
		   			   				<a href="/user/update?user_id={{$user->id}}">查看更多个人资料</a>
		   		   				</div>
		   	   				</div>

		   	   			</div>
		   	   			
		   	   		</div>
		   	   	</div>

		   </div>
		   <div class="clearx zone-line-container">

			   	<div class="zone-album clearx">
			   		<div class="zone-banner">相册</div>

			   		<a href="/user/album?user_id={{$user->id}}" class="zone-content">
			   		@if(isset($albums))
			   			@foreach($albums as $album)
			   			<div class="zone-album-box">
			   				<img src="{{$picture[$album->id]}}" alt="">
			   				<div class="zone-ablum-text">
			   					社会活动
			   					<span class="pic-count">
			   						图片数：
			   						<span>{{$pictureCount[$album->id]}}</span>
			   					</span>
			   				</div>
			   			</div>
			   			@endforeach
			   		@endif
			   		</a>
			   		
				    <div class="zone-paging" style="display: none;">
					
				    </div>
			   	</div>

			   	<div class="zone-topics clearx">
			   		<div class="zone-banner">话题动态</div>
			   		<div class="zone-content">
			   		@if(isset($topics))
						@foreach($topics as $topic)
			   			<div class="zone-topics-item">
			   				<div class="zone-topics-head">
			   					<span class="zone-topics-title">{{$topic->title}}</span>
			   					<span class="zone-topics-date">{{$topic->created_at}}</span>
			   				</div>
			   				<div class="zone-topics-content">
			   					{{$topic->content}}
			   				</div>
			   				<div class="zone-topics-comment">
			   					(<span class="comments-count">{{$topicCommentCount[$topic->id]}}</span>)个评论
			   				</div>
			   			</div>
						@endforeach
			   		@endif
			   			<div class="zone-topics-more">
			   				<a href="/user/topic?user_id={{$user->id}}">查看更多话题动态</a>
			   			</div>

			   		</div>
			   	</div>

		   </div>
		   	

	   </div>
	</div>
@stop


@section("js")
    @parent
    <script type="text/javascript" src="/dist/js/pages/zone.js"></script>
@stop
