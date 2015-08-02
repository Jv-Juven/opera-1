
$CommentReplyTemplate = $("#comment-reply-template");
CommentReplyTemplate = _.template($CommentReplyTemplate.html());

showComments = (e)->
	$parent = $(e.currentTarget).parent().parent();
	$parent.find(".comments").slideToggle("slow");

showCommentReplyArea = (e)->
	$parent = $(e.currentTarget).parent().parent().parent().parent();
	commentId = $parent.find(".comment-id").val();
	topicId = $parent.parent().parent().parent().parent().find(".topic-id").val()

	$replyInputWrapper = $parent.find(".reply-input-wrapper");
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
			alert "提交评论成功"
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
			alert "提交回复成功"
			$newReply = $(CommentReplyTemplate(res.reply))
			$parent.parent().append($newReply);
			$parent.hide();
			$parent.find(".reply-input").val("")
		else
			alert "提交回复失败"

$ ->
	$showCommentsBtn = $(".show-comments-btn");
	$commentReplyBtn = $(".comment-reply-btn");
	$replyBtn = $(".reply-btn");

	$commentReplySubmitBtn = $(".comment-reply-submit-btn")
	$replySubmitBtn = $(".reply-submit-btn")
 
	$showCommentsBtn.click showComments
	$commentReplyBtn.click showCommentReplyArea
	$replyBtn.click showReplyArea

	$commentReplySubmitBtn.click submitCommentReply
	$replySubmitBtn.click submitReply








