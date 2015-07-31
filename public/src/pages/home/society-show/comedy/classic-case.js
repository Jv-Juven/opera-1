
$(".classic-content").click(function() {
	var id = $(this).children("img").attr("data-id");
	$.post("/customer/performance/appreciation_more",{
		video_id : id
	},function(data) {
		$("#case_video iframe").attr("src",data["video"]);
		$("#case_video iframe").centerscreen({
			width: 510,
			height: 498
		});
	},"json");

	$("#case_video").fullscreen().fadeIn(400);
});