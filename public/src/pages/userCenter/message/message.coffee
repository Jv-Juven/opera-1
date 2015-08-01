
showMessageReplyArea = (e)->
	$parent = $(e.currentTarget).parent().parent();
	$commentInputWrapper = $parent.find(".message-reply-input-wrapper");
	$commentInputWrapper.fadeToggle("slow");
	$commentInputWrapper.find("textarea").focus();

showReplyArea = (e)->
	$parent = $(e.currentTarget).parent().parent().parent();
	$replyInputWrapper = $parent.find(".reply-input-wrapper");
	$replyInputWrapper.fadeToggle("slow");
	$replyInputWrapper.find("textarea").focus();

submitMessageReply = ()->
	$.post 'xxx', {}, (res)->
		if res.errCode is 0
			alert "提交评论成功"
			window.location.reload()
		else
			alert "提交评论失败"
	
submitReply = ()->
	$.post 'xxx', {}, (res)->
		if res.errCode is 0
			alert "提交回复成功"
			window.location.reload()
		else
			alert "提交回复失败"

$ ->
	$messageReplyBtn = $(".message-reply-btn");
	$replyBtn = $(".reply-btn");


	$messageReplySubmitBtn = $(".message-reply-submit-btn")
	$replySubmitBtn = $(".reply-submit-btn")
 
	$messageReplyBtn.click showMessageReplyArea
	$replyBtn.click showReplyArea

	$messageReplySubmitBtn.click submitMessageReply
	$messageReplyBtn.click submitReply








