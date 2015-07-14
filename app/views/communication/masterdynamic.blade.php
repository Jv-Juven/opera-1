@extends("layouts.subpage")

@section('title')
	<title>学会动态</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/communication/enlighten.css">
	<link rel="stylesheet" href="/dist/css/communication/masterdynamic.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.communication-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		<!-- <div class="masterdynamic-title text-center">京昆学会与《中国学生健康报》合作“京剧启蒙游戏化”栏目第四期</div>
		<div class="masterdynamic-subhead text-center">发布时间：<span class="masterdynamic-subhead-date">2015-06-21</span><span class="masterdynamic-subhead-date">13:06</span></div>
		<div class="masterdynamic-body"></div> -->
		<ul class="enlighten-list">
			<li><a href="javascript:">本真小演员布尼王出演<span class="enlighten-list-date">2015-04-02</span></a></li>
			<li><a href="javascript:">本真小演员布尼王出演<span class="enlighten-list-date">2015-04-02</span></a></li>
			<li><a href="javascript:">本真小演员布尼王出演<span class="enlighten-list-date">2015-04-02</span></a></li>
			<li><a href="javascript:">本真小演员布尼王出演<span class="enlighten-list-date">2015-04-02</span></a></li>
			<li><a href="javascript:">本真小演员布尼王出演<span class="enlighten-list-date">2015-04-02</span></a></li>
			<li><a href="javascript:">本真小演员布尼王出演<span class="enlighten-list-date">2015-04-02</span></a></li>
			<li><a href="javascript:">本真小演员布尼王出演<span class="enlighten-list-date">2015-04-02</span></a></li>
		</ul>
		<ul class="enlighten-subpage-plugin">
			<li><a href="javascript:">首页</a></li>
			<li><a href="javascript:">1</a></li>
			<li><a href="javascript:">2</a></li>
			<li><a href="javascript:">末页</a></li>
			<li>共<span class="enlighten-pages">2</span>页<span class="enlighten-items">31</span>条</li>
		</ul>
	</div>
@stop

@section('js')
	@parent
	<script type="text/javascript" src="/src/js/pages/communication/masterdynamic.js"></script>
@stop