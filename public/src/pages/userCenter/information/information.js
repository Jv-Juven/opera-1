//用户id验证
var user_verify = (function() {

    var des_id = $("#des_id").val();
    console.log(des_id);
    $.get("/user/personal/is_own",{
        user_id: des_id
    },function(data) {
        if(data["errCode"] != 0){
            $(".avatar-change,.edit-click").hide();
        }
        else{

        }
    });

})();

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
	    city = $("#info_city option:selected").text(),
	    interest = $("#info_interest").val(),
	    intro = $("#info_txtarea").val(),
	    userId = $("input[type='hidden']").val();

    $.post("/user/personal/update",{
    	user_id : userId,
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

$(".img-char").click(function() {
    
});

$.upload({
    browse_button: "change_avatar",
    container: "avatar_container",
    uptoken_url: "/qiniu/getUpToken",
    domain: "http://7xk6xh.com1.z0.glb.clouddn.com/"
},{
    FileUploaded: function (up,file,info) {
        info = $.parseJSON(info);
        domain = up.getOption("domain");
        url = domain + info.key;
        console.log("本地上传成功");
        $(".img-char").find("img").attr("src",url);
    }
});




