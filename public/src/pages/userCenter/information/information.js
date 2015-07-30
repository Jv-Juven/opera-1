


// 点击”编辑资料“按钮
$(".edit-click").click(function() {
	$(".noedit-status").hide();
	$(".edit-status").show();
});

// 点击”取消修改“按钮
$("#info_cancel").click(function() {
	
	$(".edit-status").hide();
	$(".noedit-status").show();
});

// 点击”提交修改“按钮
$("#info_confirm").click(function() {
	var realName = $("#info_name").val(),
	    gender = $(".radio-container input[type='radio']:checked").val(),
	    job = $("#info_job").val(),
	    city = $("#info_city").val(),
	    interest = $("#info_interest").val(),
	    intro = $("#info_txtarea").val();

    $.post("/user/personal/update",{
    	realname : realName,
    	gender : gender,
    	position : job,
    	city : city,
    	interests : interest,
    	per_description : intro
    },function(data){
    	if(data["errCode"] == 0){
    		window.location.href = window.location.href;
    	}
    	else{
    		alert(data["message"]);
    	}
    },"json");


});