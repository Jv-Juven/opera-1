//用户id验证
var user_verify = (function() {

    var des_id = $("#des_id").val();
    // console.log(des_id);
    $.get("/user/personal/is_own",{
        user_id: des_id
    },function(data) {
        if(data["errCode"] != 0){
            $(".avatar-change,.edit-info-ele").hide();
        }
        else{
            $(".avatar-change,.edit-info-ele").show();
        }
    });

})();

// 点击”编辑资料“按钮
$(".edit-info-ele").click(function() {
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


window.uploader({
    browse_button: "change_avatar",
    container: "img_char",
    uptoken_url: "/qiniu/getUpToken"
},{
    FileUploaded: function (up,file,info) {
        info = $.parseJSON(info);
        domain = up.getOption("domain");
        url = domain + info.key;
        $(".avatar").attr("src",url);
        $.post("/user/personal/chang_image",{
            avatar : url 
        },function (data){
            if(data["errCode"] == 0){
                console.log("头像链接保存成功");
            }
            else{
                console.log(data["message"]);
                alert("头像保存失败，请重新操作");
            }
        },"json");

    },
    Error: function(up, err, errTip) {
            return console.log(errTip);
      }
});





