;(function($){

	// $(".left-nav-list li").eq(0).addClass("active");
	// var swiperTopics = new Swiper('.topics-swiper', {
	//     direction: 'vertical',
	//     freeMode: true,
	//     mousewheelControl: true,
	//     slidesPerView: 'auto',
	//     scrollbar: '.topics-scrollbar',

	// });

	///////////////////
	// 点击topics_border01的“发布话题”按钮事件 //
	///////////////////
	$("#topics_border01 .seach-btn").click(function() {
		$("#topics_border01").fadeOut(200);
		$("#topics_border02").fadeIn(200);
	});

	///////////////////
	// 点击topics_border02的“发布话题”按钮事件 //
	///////////////////
	$(".topics-publish-btn").click(function() {

		var title = $("#topics_title").val(),
			content = $("#topics_content").val();

		$.post("/user/personal/issue_topic",{
			title: title,
			content: content
		},function(data) {
			if(data["errCode"] == 0){
				console.log("发布话题信息提交成功");
				window.location.href = window.location.href;
				// $("#topics_border02").fadeOut(200);
				// $("#topics_border01").fadeIn(200);
			}
			else{
				alert(data["message"]);
			}
		});

	});

	// 评论的展开和折叠
	var tag = 1,
	    swiperTopics;
	$(".topics-comment").click(function (){
		$(".topics-comments-container").slideToggle(800,function (){
			if(tag != 1){
				// tag = 0;
				swiperTopics.destroy();
			}
			else{
				tag = 0;
			}
			swiperTopics = new Swiper('.topics-swiper', {
			    direction: 'vertical',
			    freeMode: true,
			    mousewheelControl: true,
			    slidesPerView: 'auto',
			    scrollbar: '.topics-scrollbar',

			});
			// swiperTopics.onResize();
			// swiperTopics.updateSlidesSize();
		});

	});

	//用户评论回复
	$(".comments-item-comment").click(function (){
		$(".reply-input").appendTo($(this).parent().parent());
	});

})(jQuery);