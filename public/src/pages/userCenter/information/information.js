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

// $.get("/qiniu/getUpToken",{},function(){

// });

uploader({
    browse_button: "change_avatar",
    container: "img_char",
    uptoken_url: "/qiniu/getUpToken",
    domain: "http://7xk6xh.com1.z0.glb.clouddn.com/"
},{
    FileUploaded: function (up,file,info) {
        info = $.parseJSON(info);
        domain = up.getOption("domain");
        url = domain + info.key;
        // console.log("上传成功");
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

    }
});

function uploader(options, handlers){
    // console.log("上传头像");
    var callback, config, name, uploader;
    config = $.extend({},{
        runtimes: 'html5,flash,html4',
        browse_button: 'click-file',
        uptoken_url: '/qiniu/getUpToken',
        domain: "http://7sbxao.com1.z0.glb.clouddn.com/",
        container: 'container',
        max_file_size: '5mb',
        flash_swf_url: '/lib/plupload/Moxie.swf',
        max_retries: 3,
        dragdrop: false,
        drop_element: 'container',
        chunk_size: '4mb',
        auto_start: true,
        unique_names: true,
        save_key: true,
        statusTip: '.image-upload-tips',
        init: {
          'Error': function(up, err, errTip) {
            return console.log(errTip);
          },
          'BeforeUpload': function(up, file) {
            return $(this.getOption().statusTip).text('准备上传图片');
          },
          'UploadProgress': function(up, file) {
            return $(this.getOption().statusTip).text('正在上传图片');
          },
          'FileUploaded': function(up, file, info) {
            var domain;
            info = $.parseJSON(info);
            return domain = up.getOption('domain');
          },
          'UploadComplete': function() {
            return $(this.getOption().statusTip).text('图片上传成功');
          }
        }
    }, options);
    for (name in handlers) {
      callback = handlers[name];
      config.init[name] = callback;
    }
    uploader = Qiniu.uploader(config);
}



