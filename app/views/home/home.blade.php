@extends('layouts.master')

@section('title')
    <title>中国儿童戏剧教育网—首页</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" href="/dist/css/home/home.css">
@stop

@section('body')
    <div id="main">

    	<div id="slider">
    		<img src="/images/home/slider_img.png" class="slider-img" alt="">
    	</div>

    	<ul id="content">
    		<li>
    			<div class="content-li-head">
    				<span class="sub-title"><a href="#">协会资讯</a>/</span>
    				<span class="sub-title-en"><a href="#">ABOUT  US</a></span>
    				<span class="more"><a href="#" class="sub-title">更多》</a></span>
    			</div>
    			<ul class="content-list">
    				<li><a href="#">中国儿童戏剧协会</a></li>
    				<li><a href="#">中国儿童戏剧协会</a></li>
    				<li><a href="#">中国儿童戏剧协会</a></li>
    				<li><a href="#">中国儿童戏剧协会</a></li>
    				<li><a href="#">中国儿童戏剧协会</a></li>
    				<li><a href="#">中国儿童戏剧协会</a></li>
    				<li><a href="#">中国儿童戏剧协会</a></li>
    				<li><a href="#">中国儿童戏剧协会</a></li>
    			</ul>
    		</li>
    		<li>
    			<div class="content-li-head">
    				<span class="sub-title"><a href="#">协会表演</a>/</span>
    				<span class="sub-title-en"><a href="#">PERFORM</a></span>
    				<span class="more"><a href="#" class="sub-title">更多》</a></span>

    			</div>
    			<ul class="content-list">
    				<li><a href="#">中国儿童戏剧协会</a></li>
    				<li><a href="#">中国儿童戏剧协会</a></li>
    				<li><a href="#">中国儿童戏剧协会</a></li>
    				<li><a href="#">中国儿童戏剧协会</a></li>
    				<li><a href="#">中国儿童戏剧协会</a></li>
    				<li><a href="#">中国儿童戏剧协会</a></li>
    				<li><a href="#">中国儿童戏剧协会</a></li>
    				<li><a href="#">中国儿童戏剧协会</a></li>
    			</ul>
    		</li>
    		<li>
    			<div class="content-li-head">
    				<span class="sub-title"><a href="#">联系我们</a>/</span>
    				<span class="sub-title-en"><a href="#">CONTACT</a></span>
    			</div>
    			<ul class="content-list">
    				<li>联系电话：02039289799</li>
    				<li>联系人：林小姐</li>
    				<li>邮政编码：511431</li>
    				<li>网址：<a>www.gzhm.cm</a></li>
    				<li>地址：广州天河区水荫路34号省文化厅大院演音大楼205</li>
    				<li>
    					<img class="index-code" src="/images/home/index_code.png" alt="">
    					<div id="code_content">
    						<img class="sweep" src="/images/home/sweep_bg.png" alt="">
    						<div class="sweep sweep-text">扫一扫</div>
    						<div id="sweep_tips">打开微信扫一扫</div>
    						<div id="sweep_text">订阅 儿童戏剧</div>
    						<div id="weixin_brand">微信平台</div>
    					</div>
    				</li>
    			</ul>
    		</li>
    	</ul>
    	<div class="clear"></div>

    </div>
@stop

@section('pagesCover')
    @parent
@stop

@section('js')
	@parent
	<script type="text/javascript" src="/src/common/common.js"></script>
	<script type="text/javascript" src="/src/pages/home/home.js"></script>
@stop