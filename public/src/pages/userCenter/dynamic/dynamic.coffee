


$ ->
	$showCommentsBtn = $(".show-comments-btn");

	$showCommentsBtn.click (e)->
		$parent = $(e.currentTarget).parent().parent();
		console.log $parent[0]
		$parent.find(".comments").slideToggle("slow");