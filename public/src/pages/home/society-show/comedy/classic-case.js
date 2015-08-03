
$(".classic-content").click(function() {
	var id = $(this).children("img").attr("data-id");
	$.post("/customer/performance/appreciation_more",{
		video_id : id
	},function(data) {
		// console.log(data["viedo"]["video"]);
		var url = data["viedo"]["video"];
		$("#case_video").append('<iframe height=498 width=510 src="'+url+'" frameborder=0 allowfullscreen></iframe>').append($('<div class="video-close">×</div>'));
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