;(function($){

	// $(".left-nav-list li").eq(0).addClass("active");
	var swiperTopics = new Swiper('.topics-swiper', {
	    direction: 'vertical',
	    freeMode: true,
	    mousewheelControl: true,
	    slidesPerView: 'auto',
	    scrollbar: '.topics-scrollbar',

	});

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
		$("#topics_border02").fadeOut(200);
		$("#topics_border01").fadeIn(200);
	});

})(jQuery);