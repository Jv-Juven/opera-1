
$(".classic-content").click(function() {
	var id = $(this).children("img").attr("data-id");
	$.post("/customer/performance/appreciation_more",{
		video_id : id
	},function() {},"json");

	$("#case_video").fullscreen().fadeIn(400);
});