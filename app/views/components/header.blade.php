<header>
	<div id="header">
		<a href="/" class="logo">
			<img src="/images/common/logo.png" class="head-portrait" alt="logo">
			<!-- <div class="head-portrait"></div> -->
			<div class="head-title">儿童戏剧</div>
		</a>
		<ul class="nav">
			<li><a href="/">首页</a></li>
			<li><a href="/customer/news/one_topic/">论谈</a></li>
			<li><a href="/customer/authentication/identity/">认证</a></li>
			<li><a href="http://www.taobao.com/">商场</a></li>
			<li><a href="/customer/employment/">招贤纳士</a></li> 
			<li><a href="/user/auth/">在线报名</a></li>
		</ul>

        @if (!Auth::check())
		<!--用户未登录 -->
		<ul id="offline" class="user-info">
			<li class="login">
				<a id="login_btn" href="javascript:">登录</a>/   
				<!-- <a id="login_btn" href="/user/login">登录</a> /    -->
			</li>
			<li class="register">
				<a id="register_btn" href="javascript:">注册</a>
			</li>
		</ul>
		@else
		<!-- 用户已登录 -->
		<ul id="online" class="user-info">
			<li class="user-portrit">
				<a href="/user/space_home/">
					<img id="user_head" class="user-head" src="{{Auth::user()->avatar}}" alt="">
					<span id="user_id" class="user-id">{{Auth::user()->username}}</span>
				</a>    
			</li>
			<li class="logout">
				<a id="logout" href="javascript:">退出</a>
			</li>
		</ul>
		@endif
	</div>
</header>
