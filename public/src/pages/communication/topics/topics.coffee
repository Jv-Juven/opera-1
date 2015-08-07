
$commentTemplate = $("#comment-template")
commentTemplate = _.template $commentTemplate.html()

$commentReplyTemplate = $("#comment-reply-template")
commentReplyTemplate = _.template $commentReplyTemplate.html()

$ ->
	# 点击topics_border01的“发布话题”按钮事件
	$("#topics_border01 .seach-btn,.seach-input").click ()->
		$("#topics_border01").fadeOut(200);
		$("#topics_border02").fadeIn(200);
		#$("#topics_title").focus()

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
	$(document).on "click", ".topics-comment", (e)->
		$(".topics-comments-container").slideToggle(800, ()->
			if tag != 1
				swiperTopics.destroy();
			else
				tag = 0;

			params = {
				mode: 'vertical',
				freeMode: true,
				mousewheelControl: true,
				slidesPerView: 'auto',
				scrollbar: '.topics-scrollbar'
			}
			swiperTopics = new Swiper '.topics-swiper', params
		)

	#用户评论回复
	$(document).on "click", ".comment-reply-btn", (e)->
		$parent = $(e.currentTarget).parent().parent()
		$replyInputWrapper = $parent.find(".reply-input-wrapper")
		$replyInputWrapper.fadeToggle()

		comment_id = $parent.find(".comment-id").val()
		topic_id = $("#topic-id").val()

		$replyInputWrapper.find(".comment-id").val(comment_id)
		$replyInputWrapper.find(".topic-id").val(topic_id)
		$replyInputWrapper.find(".reply-type").val(0)


	$(document).on "click", ".reply-btn", (e)->
		$reply = $(e.currentTarget).parent().parent()
		$parent = $reply.parent()
		$comment = $parent.parent()
		$replyInputWrapper = $parent.find(".reply-input-wrapper")

		$replyInputWrapper.appendTo($parent)

		$replyInputWrapper.fadeToggle()

		topic_id = $("#topic-id").val()
		comment_id = $comment.find(".comment-id").val()
		reply_id = $reply.find(".reply-id").val()

		console.log $comment[0]
		console.log $comment.find(".comment-id")[0]
		console.log $comment.find(".comment-id").val()
		console.log comment_id

		$replyInputWrapper.find(".comment-id").val(comment_id)
		$replyInputWrapper.find(".topic-id").val(topic_id)
		$replyInputWrapper.find(".reply-id").val(reply_id)
		$replyInputWrapper.find(".reply-type").val(1)

	$(document).on "click", ".reply-submit-btn", (e)->
		$replyInputWrapper = $(e.currentTarget).parent()

		params = 
			comment_id: $replyInputWrapper.find(".comment-id").val()
			topic_id: $replyInputWrapper.find(".topic-id").val()
			reply_id: $replyInputWrapper.find(".reply-id").val()
			content: $replyInputWrapper.find(".reply-input").val()
			reply_type: $replyInputWrapper.find(".reply-type").val()

		$.post "/user/personal/reply", params, (res)->
			if res.errCode is 0
				#alert "发表回复成功"
				$parent = $replyInputWrapper.parent()
				$newReply = $(commentReplyTemplate(res.reply))
				$parent.append($newReply)
				$replyInputWrapper.hide()
				$replyInputWrapper.find(".reply-input").val("")
			else 
				alert res.message

	$(document).on "click", ".comment-btn", (e)->
		$parent = $(e.currentTarget).parent().parent()

		$commentInputWrapper = $parent.find(".comment-input-wrapper").fadeToggle()


	$(document).on "click", ".comment-submit-btn", (e)->
		$commentInputWrapper = $(e.currentTarget).parent()

		params =
			content: $commentInputWrapper.find(".reply-input").val()
			topic_id: $("#topic-id").val()

		$.post "/user/personal/topic_comment", params, (res)->
			if res.errCode is 0
				#alert "发表评论成功"
				$parent = $commentInputWrapper.parent()
				$newComment = $(commentTemplate(res.comment))
				$parent.find(".comments").append($newComment)
				$commentInputWrapper.hide()
				$commentInputWrapper.find(".reply-input").val("")
			else
				alert res.message





#删除话题、评论、回复

deleteTopics = (e)->

	if !confirm("确定要删除这个话题吗？")
		return
	topic = $(e.currentTarget).parents ".topics-items"
	topic_id = $("#topic-id").val()
	$.post "/user/personal/delete_topic",{
		topic_id : topic_id
	},(data)->
		if data["errCode"] == 0
			#topic.fadeOut()
			location.reload()
		else 
			alert data["message"]

deleteTopicComments = (e)->
	#receiver_id = $("#receiver-id").val()
	topicComment = $(e.currentTarget).parents ".comments-item"
	topiccomment_id = topicComment.find(".comment-id").val()
	$.post "/user/personal/delete_topic_comment",{
		#user_id : receiver_id,
		topiccomment_id : topiccomment_id
	},(data)->
		if data["errCode"] == 0
			topicComment.fadeOut()
		else 
			alert data["message"]


deleteCommentReply = (e)->
	#receiver_id = $("#receiver-id").val()
	commentReply = $(e.currentTarget).parents ".reply-containers"
	topic_reply_id = commentReply.find(".reply-id").val()
	$.post "/user/personal/delete_reply",{
		#user_id : receiver_id,
		topic_reply_id : topic_reply_id
	},(data)->
		if data["errCode"] == 0
			commentReply.fadeOut()
		else 
			alert data["message"]


$(document).on "click", ".topics-comment-delete", deleteTopics
$(document).on "click", ".comment-delete-btn", deleteTopicComments
$(document).on "click", ".reply-delete-btn", deleteCommentReply


















