

function reset_psd() {
	var password = $("#psd").val(),
		re_password = $("#re_psd").val();
	console.log(password);
	if(password.length < 6 || password.length>20){
		$("#psd").focus();
		alert("请输入6至20位的新密码");
		return ;
	}

	if(re_password !== password){
		$("#re_psd").focus();
		alert("请再次输入正确的新密码");
		return ;
	}

	$.post("/user/post_reset",{
		password: password,
		re_password: re_password
	},function(data){
		if(data["errCode"] == 0){
			alert("重置密码成功");
		}
		else{
			alert(data["message"]);
		}
	}."json");
}

$(".submit-btn").click(reset_psd);