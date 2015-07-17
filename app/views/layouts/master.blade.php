<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@section('title')
	<title>中国儿童戏剧曲教育网</title>
	@show
	<meta http-equiv="keywords" content="中国儿童戏剧曲教育网">
	<meta http-equiv="description" content="中国儿童戏剧曲教育网">

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
						密 码：<input id="user_pswd" type="text">
					</div>
					<div class="input">
						验证码：
						<div class="verify-img">
							<div class="verify-img-field"></div>
							<div class="verify-img-text">
								<span>看不清？</span>
								<a href="javascript:">换张图</a>
							</div>
						</div>
						<input class="verify-input" type="text">
					</div>
					<div class="login-line"></div>
					<div class="confirm-container">
						<div class="confirm-btn">登录</div>
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
						邮 箱：<input id="reg_user_mail" type="text">
					</div>
					<div class="input">
						密 码：<input id="reg_user_pswd" type="password">
					</div>
					<div class="input">
						确认密码：<input id="reg_confirm_pswd" type="password">
					</div>
					<div class="confirm-container">
						<div class="confirm-btn" id="confirm_btn">下一步</div>
					</div>
				</div>
			</div>

			<div id="verify_container" class="cover-box">
				<div class="cover-box-header">用户注册</div>
				<!-- 填写验证码 -->
				<div id="verify_code_container" class="input-container" style="display:none;">
					<div class="input" style="height:40px;">
						
					</div>
					<div class="input">
						请填写校验码，已发送到，<span id="user_mailbox"></span>请勿泄露！
					</div>
					<div class="input">
						<input type="text" placeholder="输入校验码">
						<div id="send_verify_code" class="disabled">59秒后可重新操作</div>
					</div>
					<div class="confirm-container">
						<div class="confirm-btn">确定</div>
					</div>
				</div>

				<div class="input-container">
					<div id="input_info" class="input">
						注册成功
					</div>
					<div class="confirm-container">
						<div class="confirm-btn">登录</div>
					</div>
				</div>

			</div>

		</div>
		@show

	</div>

	@section('js')
	<script type="text/javascript" src="/lib/js/jquery-1.11.2.js"></script>
	<script type="text/javascript" src="/lib/js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="/lib/js/jquery.cookie.js"></script>
	<script type="text/javascript" src="/src/components/header/header.js"></script>
	@show
</body>
</html>
