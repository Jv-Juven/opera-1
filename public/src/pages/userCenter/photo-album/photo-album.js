
//点击“创建相册”按钮
$(".album-box-add").click(function (){

	$(".album-full-screen,.screen-cover-box").fadeIn(500);

});

//输入框字数统计
$("#album_name_input").on("change input",function(){

	var str = $(this).val(),
		length = $(this).val().length,
		count = $(".box-input-percent");

	count.text(length+"/15");
	if(length > 15){
		$(this).val(str.substr(0,14));
	}

});

// 关闭新建相册层
$(".album-full-screen").click(function (){

	$(".album-full-screen,.screen-cover-box").fadeOut(800);

});

//点击“上传图片”
$("#box_btn").click(function (){

	var album_name = $("#album_name_input").val();
	if(album_name.length == 0){

		$("#album_name_input").focus();
		alert("请输入相册名称");
		return false;

	}

	$.post("/user/personal/add_album",{
		album_name: album_name
	},function (data){

		if(data["errCode"] == 0){

			var url_arr = [];

			window.uploader({
			    browse_button: "box_btn",
			    container: "box_btn_container",
			    uptoken_url: "/qiniu/getUpToken",
			    domain: "http://7xk6xh.com1.z0.glb.clouddn.com/"
			},{
			    FileUploaded: function (up,file,info) {
			        info = $.parseJSON(info);
			        domain = up.getOption("domain");
			        url = domain + info.key;
			        console.log(url);
			        // url_arr.push(url);

			    },
			    UploadComplete: function() {
	               //队列文件处理完毕后,处理相关的事情
	               console.log(url_arr.length);
	               $.post("user/personal/upload_image",{
		               	img_url: url_arr,
		               	album_id: data["album_id"]
	               },function (data){
	               	if(data["errCode"] == 0){
	               		alert("图片上传成功");
	               		window.location.href = window.location.href;
	               	}
	               	else{
	               		alert(data["message"]);
	               	}
	               });
		        }
			});
		}
		else{
			alert(data["message"]);
		}
	});
});

//点击“编辑”按钮
$(".album-oprate .album-edit").click(function (){
	$(this).parents(".album-box").find(".album-content").children(".noedit-name").hide().end().children(".edit-name").show().blur(function (){
		var self = $(this),
			album_name = $(this).val(),
			album_id = $(this).parents(".album-box").attr("data-id");
		$.post("/user/personal/edit_album",{
			album_name: album_name,
			album_id: album_id
		},function (data){
			if(data["errCode"] == 0){
				self.hide();
				self.parent().find(".noedit-name").html(album_name).show();
			}
			else{
				alert(data.message);
				window.location.href = window.location.href;
			}
		});
	});
});

//点击“删除”按钮
$(".album-oprate .album-del").click(function (){
	var album_id = $(this).parents(".album-box").attr("data-id");
	$.post("/user/personal/delete_album",{
		album_id: album_id
	},function (data){
		if(data["errCode"] == 0){
			alert("相册删除成功");
			window.location.href = window.location.href;
		}
		else{
			alert(data["message"]);
		}
	});
});


