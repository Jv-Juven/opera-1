@extends('layouts.master')

@section('title')
    <title>中国儿童戏剧教育网—首页</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" href="/dist/css/home/home.css">
    <link rel="stylesheet" href="/lib/css/swiper3.1.0.min.css">
@stop

@section('body')
    <div id="main">

    	<div id="slider">
            <div class="swiper-container home-swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{$posters[0]->image}}" class="slider-img" alt=""></div>
                    <div class="swiper-slide"><img src="{{$posters[0]->image}}" class="slider-img" alt=""></div>
                    <div class="swiper-slide"><img src="{{$posters[0]->image}}" class="slider-img" alt=""></div>
                </div>
                <!-- 如果需要分页器 -->
                <div class="swiper-pagination"></div>
                
                <!-- 如果需要导航按钮 -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                
                <!-- 如果需要滚动条 -->
                <!-- <div class="swiper-scrollbar"></div> -->
            </div>

    		<!-- <img src="{{$posters[0]->image}}" class="slider-img" alt=""> -->
    	</div>

    	<ul id="content">
    		<li>
    			<div class="content-li-head">
    				<span class="sub-title"><a href="/customer/news/one_topic/">协会资讯</a>/</span>
    				<span class="sub-title-en"><a href="/customer/news/one_topic/">ABOUT  US</a></span>
    				<span class="more"><a href="/customer/news/one_topic/" class="sub-title">更多》</a></span>
    			</div>
    			<ul class="content-list">
    				@foreach ( $columns as $column)
                                                    <li><a href="#">{{$column->title}}</a></li>
                                           @endforeach
    			</ul>
    		</li>
    		<li>
    			<div class="content-li-head">
    				<span class="sub-title"><a href="/customer/performance/teacher">协会表演</a>/</span>
    				<span class="sub-title-en"><a href="/customer/performance/teacher">PERFORM</a></span>
    				<span class="more"><a href="/customer/performance/teacher" class="sub-title">更多》</a></span>

    			</div>
    			<ul class="content-list">
                                            @foreach($backstages as $backstage)
                                                        <li><a href="#">{{$backstage->title}}</a></li>
                                            @endforeach
    			</ul>
    		</li>
    		<li>
    			<div class="content-li-head">
    				<span class="sub-title"><a href="#">联系我们</a>/</span>
    				<span class="sub-title-en"><a href="#">CONTACT</a></span>
    			</div>
    			<ul class="content-list">
    				<li>联系电话：{{$contact->number}}</li>
    				<li>联系人：{{$contact->people}}</li>
    				<li>邮政编码：{{$contact->postcode}}</li>
    				<li>网址：<a>{{$contact->site}}</a></li>
    				<li>地址：{{$contact->address}}</li>
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
    <script type="text/javascript" src="/dist/js/lib/plugins/swiper3.1.0.jquery.min.js"></script>
	<!-- // <script type="text/javascript" src="/src/common/common.js"></script> -->
	<script type="text/javascript" src="/dist/js/pages/home.js"></script>
@stop




