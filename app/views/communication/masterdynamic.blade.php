@extends("layouts.subpage")

@section('title')
	<title>学会动态</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/communication/enlighten/enlighten.css">
	<link rel="stylesheet" href="/dist/css/communication/masterdynamic/masterdynamic.css">
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
			@foreach($societies as $society)
			<li><a href="/customer/news/society_more?society_id={{{$society->id}}}">{{$society->title}}<span class="enlighten-list-date">{{$society->created_at}}</span></a></li>
			@endforeach
		</ul>
		{{$societies->links()}}
		<!-- <ul class="enlighten-subpage-plugin">
			<li><a href="javascript:">首页</a></li>
			<li><a href="javascript:">1</a></li>
			<li><a href="javascript:">2</a></li>
			<li><a href="javascript:">末页</a></li>
			<li>共<span class="enlighten-pages">{{$page}}</span>页<span class="enlighten-items">{{$society_count}}</span>条</li>
		</ul> -->
	</div>
@stop

@section('js')
	@parent
	<!-- // <script type="text/javascript" src="/src/pages/communication/masterdynamic/masterdynamic.js"></script> -->
	<script type="text/javascript" src="/dist/js/pages/masterdynamic.js"></script>
@stop