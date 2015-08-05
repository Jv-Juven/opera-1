<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@section('title')
	<title>中国儿童戏剧曲教育网</title>
	@show
	<meta http-equiv="keywords" content="中国儿童戏剧曲教育网">
	<meta http-equiv="description" content="中国儿童戏剧曲教育网">
	<!-- <link rel="shortcut icon" href="/images/common/logo.png" /> -->
	<link rel="icon" type="image/png" href="/images/icon.png">
	@section('css')
		<link rel="stylesheet" href="/dist/css/common.css">
	@show
</head>
<body>
	<div id="wrapper">
		@include('components.header')
		@section('body')

		@show
		@include('components.footer')
		
		@section('pagesCover')
		<!-- 登录、注册 -->
		<div id="page_cover">
			<!-- 登录 -->
			<div id="login_container" class="cover-box">
				<div class="cover-box-header">
					用户登录
				</div>
				<div class="input-container">
					
					<div class="input">
						用户名：<input id="user_name" type="text">
					</div>
					<div class="input">
						密&nbsp;&nbsp;&nbsp;码：<input id="user_pswd" type="password">
					</div>
					<div class="input">
						验证码：<input id="verify_input" class="verify-input" type="text">
						<div class="verify-img">
							<div class="verify-img-field">
								<img src="" id="authcode-img" width="128" height="46" />
							</div>
						</div>

					</div>
					<div class="login-line">
						<div class="login-tips">忘记密码？</div>
						
						<div class="verify-img-text">
							<span>看不清？</span>
							<a id="login_change_codes" href="javascript:">换张图</a>
						</div>
					</div>
					<div class="confirm-container">
						<div class="confirm-btn" id="login_submit">登录</div>
					</div>
				</div>
			</div>

			<!-- <div class="cover-box">
				<div id="login_success" class="input-container" style="">
					<div id="input_info" class="input">
						登录成功
					</div>
					<div class="confirm-container">
						<div id="login_success_btn" class="confirm-btn">确定</div>
					</div>
				</div>
			</div> -->

			<div id="login_findpsd" class="cover-box">
				<div class="cover-box-header find-box-head">
					<div class="find-head">
						找回密码
					</div>
					<div class="find-subhead">
						验证码将会发至你的注册邮箱或手机
					</div>
				</div>
				<div id="" class="input-container" style="">
					<div class="find-input">
						<input id="find_input" type="text" placeholder="手机号或邮箱">
					</div>
					<div class="confirm-container find-confirm-container">
						<div id="login_find_btn" class="confirm-btn">获取验证码</div>
						<div id="login_find_tips" class="confirm-btn">邮件发送中</div>
					</div>
				</div>
			</div>

			

			<!-- 注册 -->
			<div id="register_container" class="cover-box">
				<div class="cover-box-header">用户注册</div>
				<div class="input-container">
					
					<div class="input">
						用户名：<input id="reg_user_name" type="text">
					</div>
					<div class="input">
						邮&nbsp;&nbsp;&nbsp;箱：<input id="reg_user_mail" type="text">
					</div>
					<div class="input">
						密&nbsp;&nbsp;&nbsp;码：<input id="reg_user_pswd" type="password">
					</div>
					<div class="input">
						确认密码：<input id="reg_confirm_pswd" type="password">
					</div>
					<div class="confirm-container">
						<div class="confirm-btn" id="register_confirm_btn">下一步</div>
					</div>
				</div>
			</div>

			<div id="verify_container" class="cover-box">
				<div class="cover-box-header">用户注册</div>
				<!-- 填写验证码 -->
				<div id="verify_code_container" class="input-container">
					<div class="input" style="height:40px;">
						
					</div>
					<div class="input">
						请填写校验码，已发送到，<span id="user_mailbox"></span>请勿泄露！
					</div>
					<div class="input">
						<input id="user_verify_code" type="text" placeholder="输入校验码">
						<div id="send_verify_code" class="disabled">60秒后可重新操作</div>
					</div>
					<div class="confirm-container">
						<div id="verify_suc_btn" class="confirm-btn">确定</div>
					</div>
				</div>

				<div id="register_success" class="input-container" style="display:none;">
					<div id="input_info" class="input">
						注册成功
					</div>
					<div class="confirm-container">
						<div id="register_login" class="confirm-btn">登录</div>
					</div>
				</div>

			</div>

		</div>
		@show

	</div>

	@section('js')
	<script type="text/javascript" src="/dist/js/lib/jquery/jquery-1.11.2.js"></script>
	<script type="text/javascript" src="/dist/js/lib/jquery/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="/dist/js/lib/jquery/jquery.cookie.js"></script>
	<script type="text/javascript" src="/dist/js/lib/jquery/jquery.transit.js"></script>
	<script type="text/javascript" src="/dist/js/mycomponents.js"></script>
	<script type="text/javascript" src="/dist/js/common.js"></script>
	@show
</body>
</html>
