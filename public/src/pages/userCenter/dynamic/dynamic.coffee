

showComments = (e)->
	$parent = $(e.currentTarget).parent().parent();
	$parent.find(".comments").slideToggle("slow");

showCommentReplyArea = (e)->
	$parent = $(e.currentTarget).parent().parent().parent();
	$commentInputWrapper = $parent.find(".comment-input-wrapper");
	$commentInputWrapper.fadeToggle("slow");
	$commentInputWrapper.find("textarea").focus();

showReplyArea = (e)->
	$parent = $(e.currentTarget).parent().parent().parent().parent();
	$replyInputWrapper = $parent.find(".reply-input-wrapper");
	$replyInputWrapper.fadeToggle("slow");
	$replyInputWrapper.find("textarea").focus();

submitCommentReply = ()->
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
	$showCommentsBtn = $(".show-comments-btn");
	$commentReplyBtn = $(".comment-reply-btn");
	$replyBtn = $(".reply-btn");

	$commentReplySubmitBtn = $(".comment-reply-submit-btn")
	$replySubmitBtn = $(".reply-submit-btn")
 
	$showCommentsBtn.click showComments
	$commentReplyBtn.click showCommentReplyArea
	$replyBtn.click showReplyArea

	$commentReplySubmitBtn.click submitCommentReply
	$commentReplyBtn.click submitReply








