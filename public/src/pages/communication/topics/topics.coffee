
$ ->
	# 点击topics_border01的“发布话题”按钮事件
	$("#topics_border01 .seach-btn").click ()->
		$("#topics_border01").fadeOut(200);
		$("#topics_border02").fadeIn(200);

	# 点击topics_border02的“发布话题”按钮事件 
	$(".topics-publish-btn").click ()->
		title = $("#topics_title").val()
		content = $("#topics_content").val()

		$.post "/user/personal/issue_topic", {title: title,content: content}, (data)->
			if data.errCode is 0
				console.log "发布话题信息提交成功"
				window.location.href = window.location.href;
			else
				alert data.message

	# 评论的展开和折叠
	tag = 1
	swiperTopics = null
	$(".topics-comment").click ()->
		$(".topics-comments-container").slideToggle(800, ()->
			if tag != 1
				swiperTopics.destroy();
			else
				tag = 0;

			params = {
			    direction: 'vertical',
			    freeMode: true,
			    mousewheelControl: true,
			    slidesPerView: 'auto',
			    scrollbar: '.topics-scrollbar'
			}
			swiperTopics = new Swiper '.topics-swiper', params
		)

	#用户评论回复
	$(".comment-reply-btn").click (e)->
		$parent = $(e.currentTarget).parent().parent()

		$parent.find(".reply-input-wrapper").fadeIn()
