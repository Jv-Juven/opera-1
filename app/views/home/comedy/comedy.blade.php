@extends('layouts.subpage')

@section('title')
	<title>协会表演</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/communication/enlighten/enlighten.css">
	<link rel="stylesheet" href="/dist/css/home/society-show/comedy/comedy.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.home.society-show-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		<div class="figures-container clearx">
			@foreach( $teachers as $teacher)
			<div class="figures-content">
				<a href="/customer/performance/teacher_more?teacher_id={{$teacher->id}}">
					<img src="/images/admin/teachers/{{$teacher->avatar}}" alt="">
				</a>
				<span class="figures-name-container">
					{{{$teacher->position}}}
					<span class="figures-name">{{{$teacher->chinese_name}}}</span>
				</span>
			</div>
			@endforeach
			
		</div>
		{{$teachers->links()}}
		<ul class="enlighten-subpage-plugin figures-footer">
			<li><a href="javascript:">首页</a></li>
			<li><a href="javascript:">1</a></li>
			<li><a href="javascript:">2</a></li>
			<li><a href="javascript:">...</a></li>
			<li><a href="javascript:">...</a></li>
			<li><a href="javascript:">20</a></li>
			<li><a href="javascript:">下一页</a></li>
			<li><a href="javascript:">末页</a></li>
			<li>共<span class="enlighten-pages">2</span>页</li>
		</ul>
	</div>
@stop

