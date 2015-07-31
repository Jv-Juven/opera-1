


$ ->
	$showCommentsBtn = $(".show-comments-btn");
	$replyBtn = $(".reply-btn");
 
	$showCommentsBtn.click (e)->
		$parent = $(e.currentTarget).parent().parent();
		console.log $parent[0]
		$parent.find(".comments").slideToggle("slow");

	$replyBtn.click (e)->
		$parent = $(e.currentTarget).parent().parent().parent();
		$parent.find(".comment-input-wrapper").fadeToggle("slow");



