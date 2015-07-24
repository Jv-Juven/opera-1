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
		   	   			<img src="images/userCenter/figure_head.png" alt="">
		   	   			<div class="zone-header-info clearx">
		   	   				<span class="zone-header-name">王大明</span>
		   	   				<span class="zone-header-org">广西南宁</span>
		   	   			</div>
		   	   		</div>
		   	   	</div>

		   	   	<div class="zone-info">
		   	   		<div class="zone-banner">个人资料</div>
		   	   		<div class="zone-content">
		   	   			<div class="zone-info-line">
		   	   				<span class="name">真实姓名：
		   		   				<span>王大明</span>
		   	   				</span>
		   	   				<span class="sex">性别：
		   		   				<span>男</span>
		   	   				</span>
		   	   			</div>
		   	   			<div class="zone-info-intro clearx">
		   	   				<div class="intro-box">我的简介：</div>
		   	   				<div class="intro-box">
		   		   				<span class="intro-box-content">
		   		   					真做官，南，1896年生于中国华盛顿伦敦区巴黎街柏林巷1919号10栋1号房。中国妇女协会主席，曾经就妇女在日本岛遭受虐待问题向中国议会提出过，后遭到日本女优绑架。为此，印度阿三向时关禁于索马里猪牢里的布什发去贺电，表示热烈祝贺。台湾著名爱国者周洁龙表示愿意为其付出绑架费用1卢布。
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
			   			<div class="zone-album-box">
			   				<img src="images/userCenter/album.png" alt="">
			   				<div class="zone-ablum-text">
			   					社会活动
			   					<span class="pic-count">
			   						图片数：
			   						<span>3</span>
			   					</span>
			   				</div>
			   			</div>
			   			<div class="zone-album-box">
			   				<img src="images/userCenter/album.png" alt="">
			   				<div class="zone-ablum-text">
			   					社会活动
			   					<span class="pic-count">
			   						图片数：
			   						<span>3</span>
			   					</span>
			   				</div>
			   			</div>
			   		</div>

				    <div class="zone-paging">
				    	<span class="zone-Pre">
				    		<img src="images/userCenter/pre_page.png" alt="">
				    		<span class="zone-paging-text">上一页</span>
				    	</span>
				    	<span class="zone-Next">
				    		<img src="images/userCenter/next_page.png" alt="">
				    		<span class="zone-paging-text">下一页</span>
				    	</span>
				    </div>
			   	</div>

			   	<div class="zone-topics clearx">
			   		<div class="zone-banner">话题动态</div>
			   		<div class="zone-content">

			   			<div class="zone-topics-item">
			   				<div class="zone-topics-head">
			   					<span class="zone-topics-title">生活点滴相关</span>
			   					<span class="zone-topics-date">2015-07-10</span>
			   				</div>
			   				<div class="zone-topics-content">
			   					我有一只小毛驴
			   					我从来也不骑
			   					有一天我心血来潮骑它去赶集
			   					我手里拿着小皮鞭
			   					我心里正得意
			   					不知怎么哗啦啦啦啦 调到茅坑里！！！
			   				</div>
			   				<div class="zone-topics-comment">
			   					(<span class="comments-count">10</span>)个评论
			   				</div>
			   			</div>

			   			<div class="zone-topics-item">
			   				<div class="zone-topics-head">
			   					<span class="zone-topics-title">生活点滴相关</span>
			   					<span class="zone-topics-date">2015-07-10</span>
			   				</div>
			   				<div class="zone-topics-content">
			   					太阳天空照，花儿对我笑，小鸟说：“早！早！早！你为什么背上炸药包？”我去炸学校~老师不知道，手一拉，砰！砰！砰！学校转眼变平地~
			   				</div>
			   				<div class="zone-topics-comment">
			   					(<span class="comments-count">10</span>)个评论
			   				</div>
			   			</div>

			   			<div class="zone-topics-more">
			   				<span>查看更多话题动态</span>
			   			</div>

			   		</div>
			   	</div>

		   </div>
		   	

	   </div>
	</div>
@stop