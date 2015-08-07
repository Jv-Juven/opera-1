
$CommentReplyTemplate = $("#comment-reply-template");
CommentReplyTemplate = _.template($CommentReplyTemplate.html());

$CommentTemplate = $("#comment-template");
CommentTemplate = _.template($CommentTemplate.html());

showComments = (e)->
	$parent = $(e.currentTarget).parent().parent();
	$parent.find(".comments").slideToggle("slow");

showCommentArea = (e)->
	$parent = $(e.currentTarget).parent().parent();

	topic_id = $parent.parent().find(".topic-id").val()
	$commentInputWrapper = $parent.find(".comment-input-wrapper");
	$(".reply-input-wrapper, .comment-input-wrapper").hide();

	$commentInputWrapper.fadeToggle('slow');
	$commentInputWrapper.find(".reply-input").focus()
	$commentInputWrapper.find(".topic-id").val(topic_id);

showCommentReplyArea = (e)->
	$parent = $(e.currentTarget).parent().parent().parent().parent();
	commentId = $parent.find(".comment-id").val();
	topicId = $parent.parent().parent().parent().parent().find(".topic-id").val()

	$replyInputWrapper = $parent.find(".reply-input-wrapper");
	$(".reply-input-wrapper, .comment-input-wrapper").hide();

	$replyInputWrapper.fadeToggle("slow");
	$replyInputWrapper.find(".comment-id").val(commentId);
	$replyInputWrapper.find(".reply-id").val(commentId);
	$replyInputWrapper.find(".topic-id").val(topicId);
	$replyInputWrapper.find(".reply-type").val(0);
	$replyInputWrapper.find("textarea").focus();

showReplyArea = (e)->
	$reply = $(e.currentTarget).parent().parent().parent();
	$parent = $reply.parent();
	$comment = $parent.parent();

	topicId = $comment.parent().parent().parent().parent().find(".topic-id").val()
	commentId = $comment.find(".comment-id").val();
	replyId = $reply.find(".reply-id").val();

	$replyInputWrapper = $parent.find(".reply-input-wrapper");
	$(".reply-input-wrapper, .comment-input-wrapper").hide();
	$replyInputWrapper.appendTo($parent);
	$replyInputWrapper.fadeToggle("slow");
	$replyInputWrapper.find(".topic-id").val(topicId);
	$replyInputWrapper.find(".comment-id").val(commentId);
	$replyInputWrapper.find(".reply-id").val(replyId);
	$replyInputWrapper.find(".reply-type").val(1);
	$replyInputWrapper.find("textarea").focus();

submitCommentReply = (e)->
	$parent = $(e.currentTarget).parent()
	topicId = $parent.find(".topic-id").val()
	content = $parent.find(".reply-input").val()

	$.post '/user/personal/topic_comment', {topic_id: topicId, content: content}, (res)->
		if res.errCode is 0
			#alert "提交评论成功"
			$newComment = $(CommentTemplate(res.comment))
			$parent.parent().append($newComment);
			$parent.hide();
			$parent.find(".reply-input").val("")
		else
			alert "提交评论失败"
	
submitReply = (e)->
	$parent = $(e.currentTarget).parent()
	topicId = $parent.find(".topic-id").val()
	commentId = $parent.find(".comment-id").val()
	replyId = $parent.find(".reply-id").val()
	replyType = $parent.find(".reply-type").val()
	content = $parent.find(".reply-input").val()

	$.post '/user/personal/reply', {topic_id: topicId, comment_id: commentId, reply_id: replyId, reply_type: replyType, content: content}, (res)->
		if res.errCode is 0
			#alert "提交回复成功"
			$newReply = $(CommentReplyTemplate(res.reply))
			$parent.parent().append($newReply);
			$parent.hide();
			$parent.find(".reply-input").val("")
		else
			alert "提交回复失败"

#删除话题、评论、回复

deleteTopics = (e)->

	if !confirm("确定要删除这个话题")
		return
	topic = $(e.currentTarget).parents ".topic"
	topic_id = $(".topic-id").val()
	$.post "/user/personal/delete_topic",{
		topic_id : topic_id
	},(data)->
		if data["errCode"] == 0
			#topic.fadeOut()
			location.reload()
		else 
			alert data["message"]

deleteTopicComments = (e)->
    receiver_id = $("#receiver-id").val()
	topicComment = $(e.currentTarget).parents ".comment"
	topiccomment_id = topicComment.find(".comment-id").val()
	$.post "/user/personal/delete_topic_comment",{
		user_id : receiver_id,
		topiccomment_id : topiccomment_id
	},(data)->
		if data["errCode"] == 0
			topicComment.fadeOut()
		else 
			alert data["message"]


deleteCommentReply = (e)->
    receiver_id = $("#receiver-id").val()
	commentReply = $(e.currentTarget).parents ".reply"
	topic_reply_id = commentReply.find(".reply-id").val()
	$.post "/user/personal/delete_reply",{
		user_id : receiver_id,
		topic_reply_id : topic_reply_id
	},(data)->
		if data["errCode"] == 0
			commentReply.fadeOut()
		else 
			alert data["message"]


$ ->
	$(document).on "click", ".show-comments-btn", showComments 
	$(document).on "click", ".comment-reply-btn", showCommentReplyArea 
	$(document).on "click", ".reply-btn", showReplyArea 
	$(document).on "click", ".add-comment-btn", showCommentArea 
	$(document).on "click", ".comment-reply-submit-btn", submitCommentReply 
	$(document).on "click", ".reply-submit-btn", submitReply
	#删除话题、评论、回复
	$(document).on "click", ".del-comment-btn", deleteTopics
	$(document).on "click", ".comment-del-btn", deleteTopicComments
	$(document).on "click", ".del-reply-btn", deleteCommentReply

		










