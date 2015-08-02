
$messageCommentTemplate = $("#message-comment-template");
messageCommentTemplate = _.template($messageCommentTemplate.html());

$messageTemplate = $("#message-template");
messageTemplate = _.template($messageTemplate.html());

showNewMessageArea = (e)->
	$messageInputWrapper = $("#message-input-wrapper")
	
	$messageInputWrapper.fadeToggle('slow');
	$messageInputWrapper.find(".message-input").focus()

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
			$parent.parent().append($newComment);
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

submitNewMessage = (e)->
	$parent = $(e.currentTarget).parent();

	content = $parent.find(".message-input").val();
	receiver_id = $("#receiver-id").val()

	$.post "/user/personal/message", {content: content, receiver_id: receiver_id}, (res)->
		if res.errCode is 0
			alert "发表留言成功"
			$parent.hide();
			$newMessage = $(messageTemplate(res.message))
			$parent.parent().find(".messages").prepend($newMessage);
			$parent.find(".message-input").val("")
		else
			alert res.message

$ ->
	$(document).on "click", ".message-reply-btn", showMessageReplyArea 
	$(document).on "click", ".reply-btn", showReplyArea 

	$(document).on "click", ".message-reply-submit-btn", submitMessageReply 
	$(document).on "click", ".reply-submit-btn", submitReply 

	$(document).on "click", ".message-delete-btn", deleteMessage 
	$(document).on "click", "#add-comment-btn", showNewMessageArea 
	$(document).on "click", "#message-submit-btn", submitNewMessage 









