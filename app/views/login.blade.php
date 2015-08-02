@extends('layouts.subpage')

@section('title')
	<title>话题动态</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/login/login.css">
@stop

@section('page-content')
	<div id="page-content" class="clearx">
		<div id="login_container" class="cover-box-login" style="">
			<div class="cover-box-header">
				用户登录
			</div>
			<div class="input-container">
				<div class="input">
					<label for="user-name">用户名：</label>
					<input id="user-name" type="text" />
					<div style="clear:both;"></div>
				</div>
				<div class="input">
					<label for="password">密 码：</label>
					<input id="password" type="password" />
					<div style="clear:both;"></div>
				</div>
				<div class="input">
					<label for="verify-input">验证码：</label>
					<div class="verify-img">
						<div class="verify-img-field">
							<img src="{{ $captcha->inline() }}" id="authcode-img" width="128" height="46" />
						</div>
						<div class="verify-img-text">
							<span>看不清？</span>
							<a id="login_change_codes" href="javascript:">换张图</a>
						</div>
					</div>
					<input id="verify-input" class="verify-input" type="text" />
					<div style="clear:both;"></div>
				</div>
				<div class="login-line"></div>
				<div class="confirm-container">
					<div id="confirm-btn" class="confirm-btn">登录</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
@stop

@section("js")
    @parent
	<script type="text/javascript" src="/dist/js/pages/login-page.js"></script>
@stop

