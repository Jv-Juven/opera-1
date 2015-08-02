
$(".classic-content").click(function() {
	var id = $(this).children("img").attr("data-id");
	$.post("/customer/performance/appreciation_more",{
		video_id : id
	},function(data) {
		// console.log(data["viedo"]["video"]);
		$("#case_video").html($(data["viedo"]["video"])).append($('<img class="video-close" src="/images/common/close_btn.png">'));
		// $("#case_video img").addClass("video-close");
		$("#case_video iframe").centerscreen({
			width: 600,
			height: 450
		});

		$("#case_video .video-close").click(function(){
			$("#case_video").fadeOut().html("");
		});

	},"json");

	$("#case_video").fullscreen().fadeIn(400);
});