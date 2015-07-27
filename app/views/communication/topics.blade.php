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
	<div class="topics-content">
		<div class="swiper-container topics-swiper">
			<div class="swiper-wrapper">
				<div class="swiper-slider">
					<div class="topics-items">
						<img src="/images/userCenter/figure_head.png">
						<div class="topics-right-content">
							<!-- 动态内容 -->
							<div class="topics-msg">
								<div class="topics-name">佳作光</div>
								<div class="topics-title">舞动青春 - 那时归来</div>
								<div class="topics-msg-body">
									忆昔午桥桥上饮，坐中多是豪英。长沟流月去无声。杏花疏影里，吹笛到天明。
									　　二十余年如一梦，此身虽在堪惊。闲登小阁看新睛。古今多少事，渔唱起三更。
								</div>
								<div class="topics-comment">
									评论（<span>3</span>）
								</div>
							</div>
							<!-- 评论区 -->
							<div class="topics-comments-container">
								<!-- 一个用户的评论 -->
								<div class="comments-item">
									<div class="item-head">
										<div class="item-title">嘴巴的屁股</div>
										<span class="comments-item-comment">评论</span>
										<span>18:47:59</span>
										<span>2015-7-6</span>
									</div>
									<div class="item-body">这是一首抚今追昔、伤时感世这作。上片“忆昔”领起，所展现的是当年豪酣欢乐的生活画面，这正是申发题中的“忆洛中旧游”之意。</div>
								</div>
								<!-- 一个用户的评论 -->
								<div class="comments-item">
									<div class="item-head">
										<div class="item-title">嘴巴的屁股</div>
										<span class="comments-item-comment">评论</span>
										<span>18:47:59</span>
										<span>2015-7-6</span>
									</div>
									<div class="item-body">这是一首抚今追昔、伤时感世这作。上片“忆昔”领起，所展现的是当年豪酣欢乐的生活画面，这正是申发题中的“忆洛中旧游”之意。</div>
								</div>
								<!-- 一个用户的评论 -->
								<div class="comments-item">
									<div class="item-head">
										<div class="item-title">嘴巴的屁股</div>
										<span class="comments-item-comment">评论</span>
										<span>18:47:59</span>
										<span>2015-7-6</span>
									</div>
									<div class="item-body">这是一首抚今追昔、伤时感世这作。上片“忆昔”领起，所展现的是当年豪酣欢乐的生活画面，这正是申发题中的“忆洛中旧游”之意。</div>
								</div>
								<!-- 一个用户的评论 -->
								<div class="comments-item">
									<div class="item-head">
										<div class="item-title">嘴巴的屁股</div>
										<span class="comments-item-comment">评论</span>
										<span>18:47:59</span>
										<span>2015-7-6</span>
									</div>
									<div class="item-body">这是一首抚今追昔、伤时感世这作。上片“忆昔”领起，所展现的是当年豪酣欢乐的生活画面，这正是申发题中的“忆洛中旧游”之意。</div>
								</div>
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