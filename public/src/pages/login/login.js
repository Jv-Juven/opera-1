(function($){

	alert

	//登录数据页面
	// var upload_login=function(){
	// 	var name=$("#user_name").val();
	// 	var password=$("#user_pswd").val();

	// 	if(name.length==0){
	// 		alert("用户名不能为空");
	// 		return;
	// 	}
	// 	if(password<=6&&password>=20){
	// 		alert("密码长度为6-20");
	// 		return;
	// 	}
	// 	$.ajax({
	// 		url:'/user/login',
	// 		type:'POST',
	// 		dataType:'json',
	// 		data:{name:name,password:password},
	// 		timeout:10000,
	// 		success:function(){},
	// 		error:function(){}
	// 	});
	// }

	//加载验证码
	// function change_codes() {
	// 	$("#authcode-img").attr('src', ' ').attr('src', '/user/captcha' + '?id=' + Math.random(12));
	// }

	// $(".confirm-btn").on("click",function(e){
	// 	upload_login();
	// });

	// $("#login_change_codes").on("click",function(){
	// 	change_codes();
	// });

})(jQuery)