@extends('layouts.subpage')

@section('title')
	<title>在线报名</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/apply/query-score/query-score.css">
@stop


@section('page-left-nav')
	@include('components.left-nav.apply-left-nav')
@stop

@section('page-content')
<div class="page-content">
	<div class="query-board">
		<div class="query-board-header"></div>
		<div class="query-board-body">
			<div class="query-header-img">
				<img src="/images/common/logo.png" alt="">
			</div>
			<div class="query-form">
				<input id="query_num" class="query-input" type="text" placeholder="输入你的编号">
				<input id="query_name" class="query-input" type="text" placeholder="输入你的姓名">
				<div id="query_btn" class="query-submit">成绩查询</div>
			</div>

			<div class="query-result" style="display:none">
				<div class="line-one">王小花</div>
				<div class="line-two">201507081428</div>
				<div class="line-three">考试成绩为：87分</div>
			</div>

		</div>
	</div>
</div>
@stop

@section("js")
	@parent
@stop