@extends('layouts.master');

@section('title')
<title>加入我们</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/join/join.css">
@stop

@section('body')
	@parent
	<div id="main" class="main">
		<div class="join-pic">
			<img src="/images/join/join_img.png" alt="">
		</div>
		<div class="join-container">
			<div class="join-left-sidebar">
				<div class="join-left-container">
					<span class="join-left-ch">加入我们</span>
					<span class="join-left-en">JOIN US</span>
				</div>
			</div>
			<div class="join-content clearx">
				<ul>
					<li>
						<span class="h1">1.实习计划：</span>
						<span>长期欢迎创意、策划、营销、管理等方面的在校大学生来我司实习。</span>
						<span>待遇：按实际出勤天数，提供补贴15元/天。</span>
					</li>
					<li>
						<span class="h1">2.兼职生计划：</span>
						<span>长期欢迎大三及以上的学生加入。具备独立工作能力的，可作为公司培养对象。</span>
						<span>待遇：兼职生参与考勤，每月出勤18个工作日及以上，有兼职生底薪；低于18个工作日按实习生补贴标准执行。</span>
					</li>
					
					<li>
						<span class="h1">2.兼职生计划：</span>
						<span>长期欢迎大三及以上的学生加入。具备独立工作能力的，可作为公司培养对象。</span>
						<span>待遇：兼职生参与考勤，每月出勤18个工作日及以上，有兼职生底薪；低于18个工作日按实习生补贴标准执行。</span>
					</li>
					<li>
						<span class="h1">2.兼职生计划：</span>
						<span>长期欢迎大三及以上的学生加入。具备独立工作能力的，可作为公司培养对象。</span>
						<span>待遇：兼职生参与考勤，每月出勤18个工作日及以上，有兼职生底薪；低于18个工作日按实习生补贴标准执行。</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
@stop

@section('js')
	@parent
	<script type="text/javascript" src="/src/js/pages/join/join.js"></script>
@stop
