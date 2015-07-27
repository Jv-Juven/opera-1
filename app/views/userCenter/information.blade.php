@extends('layouts.subpage')


@section('title')
	<title>个人资料</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/userCenter/information/information.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.userCenter-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		<div class="page-img">
			<div class="img">
				<img class="avatar" src="{{{$user->avatar}}}">
			</div>
			<div class="img-char">
					<img class="avatar-btn" src="/images/userCenter/更换头像.png">
					<span class="avatar-char">更换头像</span>
			</div>	
		</div>

		<div>
			<p class="name">
				<span class="name-field">真实姓名:</span><span class="name-info">{{{$user->realname}}}</span>
				<img class="edit-btn" src="images/userCenter/修改资料.png">
				<span class="edit-info">修改资料</span>
			</p>
			<p class="gender">
				<span class="name-field">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别:</span>
				@if($user->gender == 0)
				<span class="name-info">男</span>
				@elseif($user->gender ==1)
				<span class="name-info">女</span>
				@elseif($user->gender == 2)
				<span class="name-info"></span>
				@endif
			</p>
			<p class="position">
				<span class="name-field">职&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;位:</span><span class="name-info">{{{$user->postion}}}</span>
			</p>
			<p class="city">
				<span class="name-field">所在城市:</span><span class="name-info">{{{$user->city}}}</span>
			</p>
			<p class="internets">
				<span class="name-field">兴&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;趣:</span><span class="name-info">{{{$user->interests}}}</span>
			</p>
			<p class="per-description">
				<span class="name-field">我的简介:</span>
				<span class="name-info">
					{{{$user->per_description}}}
				</span>
			</p>
		</div>
	</div>

@stop