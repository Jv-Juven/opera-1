<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登陆</title>

	<link rel="stylesheet" href="/dist/css/login/login.css">
</head>
<body>

	<div id="wrapper">
		
		@include('components.header')
		<!-- 登录 -->
		<div id="page_cover" class="clearx">
			<div id="login_container" class="cover-box-login" style="">
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
							<div class="verify-img-field">
								<img src="{{ $captcha->inline() }}" id="authcode-img" width="128" height="46" />
							</div>
							<div class="verify-img-text">
								<span>看不清？</span>
								<a id="login_change_codes" href="javascript:">换张图</a>
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
			<div class="clear"></div>
		</div>

		@include('components.footer')
	</div>

	<script type="text/javascript" src="/lib/js/jquery-1.11.2.js"></script>
	<script type="text/javascript" src="/lib/js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="/lib/js/jquery.cookie.js"></script>
	<script type="text/javascript" src="/src/pages/login/login.js"></script>

</body>
</html>