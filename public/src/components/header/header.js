;(function($){

	var userMail = "";
	
	//登录数据页面
	var upload_login = function(){
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
				if(data['errCode'] == 0){}
					else{
						$("#login_container").fadeOut(400);
						$("#login_success").fadeIn(400);
						$("#login_success_btn").click(function (){
							$("#login_success,#page_cover").fadeOut(400);
						});
					}
			},
			error:function(){}
		});
	}

	//加载验证码
	var change_codes = function () {
		$("#authcode-img").attr('src', ' ').attr('src', '/user/captcha' + '?id=' + Math.random(12));
	};

	change_codes();

	$("#login_submit").on("click",function(e){
		upload_login();
	});

	$("#login_change_codes").on("click",function(){
		change_codes();
	});



	//用户注册信息页面
	var upload_register=function(){

		var name=$("#reg_user_name").val();
		var mail=$("#reg_user_mail").val();
		var password=$("#reg_user_pswd").val();
		var re_password=$("#reg_confirm_pswd").val();

		if(name.length==0){
			alert("请填写用户名");
			return;
		}
		if(!/^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/.test(mail)){
			alert("请填写正确的邮箱");
			return;
		}
		if(password.length<6||password.length>20){
			alert("请输入6-20位的密码");
			return;
		}
		if(password.length!==re_password.length){
			alert("确认密码有误");
			return;
		}

		userMail=mail;

		$.ajax({
			url:'/user/register',
			type:'POST',
			dataType:'json',
			data:{
				username:name,
				email:mail,
				password:password,
				re_password:re_password
			},
			timeout:10000,
			success:function(data){
				var data=eval(data);
				console.log(data['errCode']+"、"+data['message']);
				if(data['errCode']==0){

					$("#register_container").fadeOut(400);
					$("#verify_container").fadeIn(400,function(){
						count();
					});
					$("#user_mailbox").text(mail);

				}
				else{

					alert(data['message']);

				}
			},
			error:function(){
				alert("注册失败");
			}
		});
	} 
	
	$("#login_btn").click(function(){
		$(".cover-box").hide();
		$("#page_cover,#login_container").fadeIn(300);
	});

	$("#register_btn").click(function(){

		// $("#page_cover,#verify_container").fadeIn(300);
		// count();
		$("#page_cover,#register_container").fadeIn(300);
	});

	$("#confirm_btn").click(upload_register);

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

		// alert("发送验证码成功！");
		count();
		$("#send_verify_code").addClass("disabled").removeClass("active");
	});

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

					$("#verify_container").fadeOut(300);
					$("#register_success").fadeIn(400);

				}
				else{
					alert(data['message']);
				}
			},
			error:function(){}
		});
		
	});


})(jQuery);