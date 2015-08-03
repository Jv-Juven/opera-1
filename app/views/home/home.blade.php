@extends('layouts.master')

@section('title')
    <title>中国儿童戏剧教育网—首页</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" href="/lib/css/swiper3.1.0.min.css">
    <link rel="stylesheet" href="/dist/css/home/home.css">
@stop

@section('body')
    <div id="main">

    	<div id="slider">
            <div class="swiper-container home-swiper-container">
                <div class="swiper-wrapper">
                    @if(isset($posters))
                        @foreach($posters as $poster)
                    <div class="swiper-slide"><a href="{{$poster->link}}"><img src="/images/admin/posters/{{$poster->image}}" class="slider-img" alt=""></a></div>
                        @endforeach
                    @endif
                </div>
                <!-- 如果需要分页器 -->
                <div class="swiper-pagination"></div>

            </div>

    	</div>

    	<ul id="content">
    		<li>
    			<div class="content-li-head">
    				<span class="sub-title"><a href="/customer/news/one_topic/">协会资讯</a>/</span>
    				<span class="sub-title-en"><a href="/customer/news/one_topic/">ABOUT  US</a></span>
    				<span class="more"><a href="/customer/news/one_topic/" class="sub-title">更多》</a></span>
    			</div>
    			<ul class="content-list home-list">
    	       @if(isset($columns))
                                        @foreach ( $columns as $column)
                                        <li>
                                            <a href="customer/news/column_more?column_id={{$column->id}}">
                                                {{$column->title}}
                                            </a>
                                        </li>
                                       @endforeach
                    @endif
    			</ul>
    		</li>
    		<li>
    			<div class="content-li-head">
    				<span class="sub-title"><a href="/customer/performance/teacher">协会表演</a>/</span>
    				<span class="sub-title-en"><a href="/customer/performance/teacher">PERFORM</a></span>
    				<span class="more"><a href="/customer/performance/teacher" class="sub-title">更多》</a></span>

    			</div>
    			<ul class="content-list home-list">
            @if(isset($backstages))
                    @foreach($backstages as $backstage)
                    <li>
                        <a href="customer/performance/backstage_more?backstage_id={{$backstage->id}}">
                            {{$backstage->title}}
                        </a>
                    </li>
                    @endforeach
            @endif
    			</ul>
    		</li>
    		<li>
    			<div class="content-li-head">
    				<span class="sub-title"><a>联系我们</a>/</span>
    				<span class="sub-title-en"><a>CONTACT</a></span>
    			</div>
    			<ul class="content-list home-code">
                                        @if(isset($contact))
    				<li>联系电话：{{$contact->number}}</li>
    				<li>联系人：{{$contact->people}}</li>
    				<li>邮政编码：{{$contact->postcode}}</li>
    				<li>网址：<a>{{$contact->site}}</a></li>
    				<li>地址：{{$contact->address}}</li>
                                        @endif
    				<li id="home_code_container">
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
    <script type="text/javascript" src="/dist/js/lib/plugins/swiper.min.js"></script>
	<!-- // <script type="text/javascript" src="/src/common/common.js"></script> -->
	<script type="text/javascript" src="/dist/js/pages/home.js"></script>
@stop




