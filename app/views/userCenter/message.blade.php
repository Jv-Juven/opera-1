@extends('layouts.subpage')


@section('title')
	<title>留言</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/userCenter/message/message.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.userCenter-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		<div class="image">
			<img src="images/userCenter/figure_head.png">
		</div>
		<div>
			<p><span class= "name">张三</span><span class ="time">2015-07-27</span></p>
		</div>
		<div class="content">
			<p>你好丑啊啊啊啊啊 啊啊啊啊啊啊啊啊，真是d的 的   的的的的的订单  的的的的的的</p>
		</div>
		<div class="message-btn">
			<p class="message-edit"><span class= "reply-btn">回复</span>|<span class = "delete-btn">删除</span></p>
		</div>

	</div>

	<div class="page-content">
		<div class="image">
			<img src="images/userCenter/figure_head.png">
		</div>
		<div>
			<p><span class= "name">张三</span><span class ="time">2015-07-27</span></p>
		</div>
		<div class="content">
			<p>你好丑啊啊啊啊啊 啊啊啊啊啊啊啊啊，真是d的 的   的的的的的订单  的的的的的的</p>
		</div>
		<div class="message-btn">
			<p class="message-edit"><span class= "reply-btn">回复</span>|<span class = "delete-btn">删除</span></p>
		</div>

	</div>

	<div class="page-content">
		<div class="image">
			<img src="images/userCenter/figure_head.png">
		</div>
		<div>
			<p><span class= "name">张三</span><span class ="time">2015-07-27</span></p>
		</div>
		<div class="content">
			<p>你好丑啊啊啊啊啊 啊啊啊啊啊啊啊啊，真是d的 的   的的的的的订单  的的的的的的</p>
		</div>
		<div class="message-btn">
			<p class="message-edit"><span class= "reply-btn">回复</span>|<span class = "delete-btn">删除</span></p>
		</div>

	</div>

@stop