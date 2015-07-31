
$(".classic-content").click(function() {

	$.get("/customer/performance/appreciation_more",{},function() {},"json");

	$("#case_video").fullscreen().fadeIn(400);
});