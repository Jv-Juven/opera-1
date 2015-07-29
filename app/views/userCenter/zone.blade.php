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
		   	   		<div class="zone-content">
		   	   			<img src="{{$user->avatar}}" alt="">
		   	   			<div class="zone-header-info clearx">
		   	   				<span class="zone-header-name">{{$user->realname}}</span>
		   	   				<span class="zone-header-org">{{$user->city}}</span>
		   	   			</div>
		   	   		</div>
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
		   	   				<div class="intro-box">我的简介：</div>
		   	   				<div class="intro-box">
		   		   				<span class="intro-box-content">
		   		   					{{$user->per_description}}
		   		   				</span>
		   		   				
		   		   				<div class="more">
		   			   				<span>查看更多个人资料</span>
		   		   				</div>
		   	   				</div>

		   	   			</div>
		   	   			
		   	   		</div>
		   	   	</div>

		   </div>
		   <div class="clearx zone-line-container">

			   	<div class="zone-album clearx">
			   		<div class="zone-banner">相册</div>

			   		<div class="zone-content">
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
			   		</div>
			   		
				    <div class="zone-paging">
				    	<span class="zone-Pre">
				    		<img src="/images/userCenter/pre_page.png" alt="">
				    		<span class="zone-paging-text">上一页</span>
				    	</span>
				    	<span class="zone-Next">
				    		<img src="/images/userCenter/next_page.png" alt="">
				    		<span class="zone-paging-text">下一页</span>
				    	</span>
				    </div>
			   	</div>

			   	<div class="zone-topics clearx">
			   		<div class="zone-banner">话题动态</div>
			   		<div class="zone-content">
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
			   			
			   			<div class="zone-topics-more">
			   				<span>查看更多话题动态</span>
			   			</div>

			   		</div>
			   	</div>

		   </div>
		   	

	   </div>
	</div>
@stop


@section("js")
    @parent
@stop
