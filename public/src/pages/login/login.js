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
			url:'/user/login',
			type:'POST',
			dataType:'json',
			data:{name:name,password:password},
			timeout:10000,
			success:function(){},
			error:function(){}
		});
	}

	$(".confirm-btn").on("click",function(e){
		upload_login();
	});

})(jQuery)