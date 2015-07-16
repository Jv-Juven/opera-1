;(function($){

	//登录数据页面
	var upload_login=function(){
		var name=$("#user_name").val();
		var password=$("#user_pswd").val();

		if(name.length==0){
			return;
		}
		if(password<=6&&password>=20){
			return;
		}
		$.ajax({
			url:'',
			type:'POST',
			dataType:'json',
			data:{name:name,password:password},
			timeout:10000,
			success:function(){},
			error:function(){}
		});
	}

	//用户注册信息页面
	var upload_register=function(){

		var name=$("#reg_user_name").val();
		var mail=$("#reg_user_mail").val();
		var password=$("#reg_user_pswd").val();
		var re_password=$("#reg_confirm_pswd").val();

		if(name.length==0){
			alert("姓名啦~");
			return;
		}
		if(!/^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/.test(mail)){
			alert("邮箱错误啦~");
			return;
		}
		if(password<6||password>20){
			alert("密码错误啦~");
			return;
		}
		if(password!==re_password){
			alert("确认密码错误啦~");
			return;
		}

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
				if(data['errCode']==0){
					alert(data['message']);
				}
				else{
					$("#user_mailbox").text(mail);
					$("#register_container").fadeOut(200);
					$("#varify_container").fadeOut(200);
				}
			},
			error:function(){
				alert("注册失败");
			}
		});
	} 
	
	$("#login_btn").click(function(){
		$("#page_cover,#login_container").fadeIn(300);
	});

	$("#register_btn").click(function(){
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

})(jQuery);