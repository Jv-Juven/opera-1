;(function($){

	var	userMail = "",
	    userName = "",
	    userPassword = "";


    //写cookies
    function setCookie(name,value)
    {
        var Days = 30;
        var exp = new Date();
        exp.setTime(exp.getTime() + Days*24*60*60*1000);
        document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString()+";path=/";

        
        // var strsec = getsec(time);
        // var exp = new Date();
        // exp.setTime(exp.getTime() + strsec*1);
        // document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
    }

    //读取cookies
    function getCookie(name)
    {
        var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
     
        if(arr=document.cookie.match(reg))
     
            return (arr[2]);
        else
            return null;
    }

    //删除cookies
    function delCookie(name)
    {
        var exp = new Date();
        exp.setTime(exp.getTime() - 1);
        var cval=getCookie(name);
        if(cval!=null)
            document.cookie= name + "="+cval+";expires="+exp.toGMTString()+";path=/";
    }

    //用户登录成功之后
    function online(imgUrl,userN) {

    	$("#offline").hide();
    	$("#online").fadeIn();

    	$("#user_head").attr("src"," ").attr("src",imgUrl);
    	$("#user_id").text(userN);

    	$("#login_container, #page_cover").fadeOut(400);
    	$("#login_success").fadeIn(400);
    	$("#login_success_btn").click(function (){
    		$("#login_success,# page_cover").fadeOut(400);
    	});

    }


     //////////////
     // 检测用户是否登录 //
     //////////////
    (function () {
      
    	if(getCookie("opera_userId") !== null){
    		// console.log(unescape(getCookie("opera_userImg")));

    		$("#offline").hide();
    		$("#online").show();

    		$("#user_head").attr("src"," ").attr("src",unescape(getCookie("opera_userImg")));
    		$("#user_id").text(getCookie("opera_userName"));

    		$(".user-portrit>a").attr("href","/user/space_home/?user_id="+getCookie("opera_userId"));

    	}
    	else {
    		console.log("没有用户登录！");
    	}

    })();
	
	//登录数据页面
	var upload_login = function () {
		var name = $("#user_name").val();
		var password = $("#user_pswd").val();
		var verify_code = $("#verify_input").val();
		if(name.length == 0){
			alert("请输入用户名");
			$("#user_name").focus();
			return;
		}
		if(password.length < 6 || password.length > 20){
			alert("请输入6-20位的密码");
			$("#user_pswd").focus();
			return;
		}
		if(verify_code.length == 0){
			alert("请输入验证码");
			$("#verify_input").focus();
			return;
		}
		$.ajax({
			url:'/user/login',
			type:'POST',
			dataType:'json',
			data:{
				username: name,
				password: password,
				captcha: verify_code
			},
			timeout:10000,
			success:function (data){
				if(data['errCode'] == 0){
					// console.log(data['user']['avatar']);
					online(data['user']['avatar'],data['user']['username']);

					

					setCookie("opera_userId",data["user"]["id"]);
					setCookie("opera_userName",data["user"]["username"]);
					setCookie("opera_userImg",data['user']['avatar']);
					$(".user-portrit>a").attr("href","/user/space_home/?user_id="+getCookie("opera_userId"));

					// console.log(data['user']['avatar']);
					// console.log(getCookie("opera_userImg"));
					
				}
				else{
					alert(data['message']);
				}
			},
			error:function(){}
		});
	}

	//用户登出
	var logout = function (){

		$.ajax({
			url: 'user/logout',
			type: 'get',
			data: {},
			dataType: 'json',
			timeout: 10000,
			success: function (data){

				if (data['errCode'] == 0){

					alert("退出成功");

					//删除本地存储
					delCookie("opera_userId");
					delCookie("opera_userImg");
					delCookie("opera_userName");
					
					window.location.href = "/";

					// console.log(data['errCode'] + "." + data['message']);

				}
			},
			error: function (data){
				alert(data['message']);
			}
		});

	}

	//加载验证码
	var change_codes = (function () {
		$("#authcode-img").attr('src', ' ').attr('src', '/user/captcha' + '?id=' + Math.random(12));
	});



	//用户注册信息页面
	var upload_register = function (){

		var name = $("#reg_user_name").val();
		var mail = $("#reg_user_mail").val();
		var password = $("#reg_user_pswd").val();
		var re_password = $("#reg_confirm_pswd").val();

		if(name.length == 0) {
			alert("请填写用户名");
			return;
		}
		if(!/^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/.test(mail)) {
			alert("请填写正确的邮箱");
			return;
		}
		if(password.length < 6 || password.length > 20) {
			alert("请输入6-20位的密码");
			return;
		}
		if(password.length !== re_password.length) {
			alert("确认密码有误");
			return;
		}

		userMail = mail;
		userName = name;
		userPassword = password;

		$.ajax({
			url: '/user/register',
			type: 'POST',
			dataType: 'json',
			data: {
				username:name,
				email:mail,
				password:password,
				re_password:re_password
			},
			timeout: 10000,
			success: function(data){
				var data = eval(data);
				console.log(data['errCode'] + "、" + data['message']);
				if(data['errCode'] == 0){

					$("#register_container").hide();
					$("#verify_container").fadeIn(400,function(){
						count();
					});
					
					$("#user_mailbox").text(mail);

				}
				else{

					alert(data['message']);

				}
			},
			error: function(){
				alert("注册失败");
			}
		});
	} 

	change_codes();

	$("#login_submit").on("click",function(e){
		upload_login();
	});

	$("#login_change_codes").on("click",function(){
		change_codes();
	});


	
	$("#login_btn").click(function(){
		$(".cover-box").hide();
		$("#page_cover,#login_container").fadeIn(300);
		// $("#page_cover,#login_findpsd").fadeIn(300);
	});

	$("#register_btn").click(function(){

		// $("#page_cover,#verify_container").fadeIn(300);
		// count();
		$("#page_cover,#register_container").fadeIn(300);
	});

	$("#register_confirm_btn").click(upload_register);

	//-------取消点击登录框和注册框的冒泡事件 START---------
	$(".cover-box").click(function(){
		return false;
	});
	//-------取消点击登录框和注册框的冒泡事件 END---------

	$("#page_cover").click(function(){
		$("#page_cover,.cover-box").fadeOut(400);
	});

	//////////
	// 计时器 //
	//////////
	function count(num){
		$("#send_verify_code").addClass("disabled").removeClass("active");
		$("#send_verify_code").text("60秒后可重新操作");

		if(!num){
			num=60;
		}

		clearInterval(setTime);

		var setTime=setInterval(function(){
			--num;
			$("#send_verify_code").text(num+"秒后可重新操作");
			if(num<0){
				$("#send_verify_code").text("发送验证码").removeClass("disabled").addClass("active");
				clearInterval(setTime);
				return;
			}
		},1000);
	}

	////////////////
	// 点击发送验证码按钮 //
	////////////////
	$("#send_verify_code").click(function(){
		if(!$(this).hasClass("active")){


			return;
		}
		
		$.post('/user/resend_checkcode',{email:userMail},function (data){

			console.log(data["message"]);
			
		},'json');

		count();
		$("#send_verify_code").addClass("disabled").removeClass("active");
	});


    /////////////
    // 验证码确定按钮 //
    /////////////
	$("#verify_suc_btn").click(function(){

		$.ajax({
			url: '/user/check_captcha',
			type: 'POST',
			dataType: 'json',
			data: {captcha: $("#user_verify_code").val(),email: userMail},
			timeout: 10000,
			success: function (data){
				if(data['errCode']==0){

					alert("注册成功");

					$("#verify_code_container").hide();
					$("#register_success").fadeIn(400);

				}
				else{
					alert(data['message']);
				}
			},
			error:function(){}
		});
		
	});

	////////////////////
	// 注册成功之后的“登录”按钮 //
	////////////////////
	$("#register_login").click(function(){

		$("#verify_container").fadeOut(400);
		$("#login_container").fadeIn(400);

		$("#user_name").val(userName);
		$("#user_pswd").val(userPassword);

	});

	///////////
	// 用户登出 //
	///////////
    $("#logout").click(logout);


    //////////////
    // 点击“忘记密码” //
    //////////////
    $(".login-tips").click(function() {
    	$("#login_container").fadeOut(400);
    	$("#login_findpsd").fadeIn(300);
    });


})(jQuery);