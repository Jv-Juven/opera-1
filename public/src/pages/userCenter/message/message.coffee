
$messageCommentTemplate = $("#message-comment-template");
messageCommentTemplate = _.template($messageCommentTemplate.html());

showMessageReplyArea = (e)->
	$message = $(e.currentTarget).parent().parent();
	$replyInputWrapper = $message.find(".reply-input-wrapper");

	messageId = $message.find(".message-id").val()
	$replyInputWrapper.find(".message-id").val(messageId);
	$replyInputWrapper.find(".comment-type").val(0);

	$replyInputWrapper.fadeToggle("slow");
	$replyInputWrapper.find("textarea").focus();

showReplyArea = (e)->
	$reply = $(e.currentTarget).parent().parent();
	$parent = $reply.parent();
	$replyInputWrapper = $parent.find(".reply-input-wrapper");

	commentId = $reply.find(".comment-id").val();
	messageId = $parent.parent().find(".message-id").val()
	$replyInputWrapper.find(".comment-id").val(commentId);
	$replyInputWrapper.find(".message-id").val(messageId);
	$replyInputWrapper.find(".comment-type").val(1);

	$replyInputWrapper.fadeToggle("slow");
	$replyInputWrapper.find("textarea").focus();

submitMessageReply = (e)->
	$parent = $(e.currentTarget).parent().

	$.post '/user/personal/message_comment', {}, (res)->
		if res.errCode is 0
			alert "提交评论成功"
		else
			alert "提交评论失败"
	
submitReply = (e)->
	$parent = $(e.currentTarget).parent()
	commentId = $parent.find(".comment-id").val()
	messageId = $parent.find(".message-id").val()
	commentType = $parent.find(".comment-type").val()
	content = $parent.find(".reply-input").val()

	$messageCount = $parent.parent().parent().find(".message-comment-count");
	console.log $parent.parent().parent()[0]
	console.log $messageCount.html()
	messageCount = parseInt($messageCount.html()) + 1;
	$messageCount.html(messageCount);

	$.post '/user/personal/message_comment', {message_id: messageId, comment_id: commentId, content: content, comment_type: commentType}, (res)->
		if res.errCode is 0
			alert "提交回复成功"
			$parent.hide();
			$newComment = $(messageCommentTemplate(res.comment))
			$parent.parent().prepend($newComment);
			$parent.find(".reply-input").val("")
		else
			alert "提交回复失败"

deleteMessage = (e)->
	$message = $(e.currentTarget).parent().parent();
	messageId = $message.find(".message-id").val()
	
	$.post '/user/personal/delete_message', {message_id: messageId}, (res)->
		if res.errCode is 0
			alert "删除留言成功"
			$message.fadeOut();
		else
			alert "删除留言失败"


$ ->
	$messageReplyBtn = $(".message-reply-btn");
	$replyBtn = $(".reply-btn");

	$messageReplySubmitBtn = $(".message-reply-submit-btn")
	$replySubmitBtn = $(".reply-submit-btn")
	$messageDeleteBtn = $(".message-delete-btn")
 
	$messageReplyBtn.click showMessageReplyArea
	$replyBtn.click showReplyArea

	$messageReplySubmitBtn.click submitMessageReply
	$replySubmitBtn.click submitReply

	$messageDeleteBtn.click deleteMessage







