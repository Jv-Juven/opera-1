;(function(window){

	var submit_btn = $(".apply-btn-container span").eq(0),
		 reset = $(".apply-btn-container span").eq(1);

	var submit = function () {

		$("#info_name").text();

		 var applyName = $("#apply_name").val(),
				   sex = $(".radio-container input:checked").val(),
			  bornDate = $("#born_date").val(),
		   nativePlace = $("#native_place").val(),
			 applyAddr = $("#apply_addr").val(),
			  guardian = $("#guardian").val(),
			applyPhone = $("#apply_phone").val(),
			 applyUnit = $("apply_unit").val(),
			  applyJob = $("#apply_job").val(),
				    qq = $("#qq").val(),
		   applySchool = $("#apply_school").val(),
		 applyPostcode = $("#apply_postcode").val(),
			 trainUnit = $("#train_unit").val(),
			applyTrade = $("#apply_trade").val(),
			 learnTime = $("#learn_time").val(),
		  applyDetails = $("#apply_details").val();

		  if($(applyName).length == 0){
		  	alert("请填写姓名");
		  	$("#apply_name").focus();
		  	return false;
		  }
		  // if(!sex){
		  // 	alert("请选择性别");
		  // 	$(".radio-container").eq(0).find("input").focus();
		  // 	return false;
		  // }
		  // if(bornDate.length == 0){
		  // 	alert("请选择出生年月");
		  // 	return false;
		  // }
		  // if(nativePlace.length == 0){
		  // 	alert("请填写籍贯");
		  // 	$("#native_place").focus();
		  // 	return false;
		  // }
		  // if(applyAddr.length == 0){
		  // 	alert("请填写居住地址");
		  // 	$("#apply_addr").focus();
		  // 	return false;
		  // }
		  // if(guardian.length == 0){
		  // 	alert("请填写监护人");
		  // 	$("#guardian").focus();
		  // 	return false;
		  // }
		  if(!'/^(13[0-9]|15[0|1|2|3|5|6|7|8|9]|18[0-9]|17[0-9])\d{8}$/'.test(applyPhone)){
		  	alert("请填写正确的手机号码");
		  	$("#apply_phone").focus();
		  	return false;
		  }
		  // if(applyUnit.length == 0){
		  // 	alert("请填写单位");
		  // 	$("#apple_unit").focus();
		  // 	return false;
		  // }
		  // if(applyJob.length == 0){
		  // 	alert("请填写职务");
		  // 	$("#apply_job").focus();
		  // 	return false;
		  // }
		  // if(qq.length == 0){
		  // 	alert("请填写QQ号码");
		  // 	$("#qq").focus();
		  // 	return false;
		  // }

		  // if(applySchool.length == 0){
		  // 	alert("请填写所在学校");
		  // 	$("#apply_school").focus();
		  // 	return false;
		  // }
		  //  if(!'/^[1-9][0-9]{5}$/'.test(applyPostcode)){
		  // 	alert("请正确填写邮编");
		  // 	$("#apply_postcode").focus();
		  // 	return false;
		  // }
		  //  if(trainUnit.length == 0){
		  // 	alert("请填写京剧培训单位");
		  // 	$("#train_unit").focus();
		  // 	return false;
		  // }
		  // if(applyTrade.length == 0){
		  // 	alert("请填写行当");
		  // 	$("#apply_trade").focus();
		  // 	return false;
		  // }

		  //  if(learnTime.length == 0){
		  // 	alert("请填写行当");
		  // 	$("#learn_time").focus();
		  // 	return false;
		  // }

		  $.post("/user/application",{
		  	name         : applyName,
		  	gender       : sex,
		  	// year         :
		  	// month        :
		  	// day          :
		  	hometown     : nativePlace,
		  	address      : applyAddr,
		  	guardian     : guardian,
		  	phone        : applyPhone,
		  	unit         : applyUnit,
		  	position     : applyJob,
		  	QQ           : qq,
		  	school       : applySchool,
		  	postcode     : applyPostcode,
		  	trainingunit : trainUnit,
		  	profession   : applyTrade,
		  	timeoflearn  : learnTime,
		  	details      : applyDetails
		  },function (data){
		  	if(data["errCode"] == 0) {
		  		alert("提交成功");
		  	}
		  	else {
		  		alert(data["message"]);
		  	}
		  },"json");


	} 

	$(submit_btn).click(submit);


})(window);