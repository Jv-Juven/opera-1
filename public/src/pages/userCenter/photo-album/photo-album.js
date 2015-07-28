

var albumSwiper = new Swiper(".photo-album-swiper",{
	direction: "horizontal",
	// freeMode: true,
	speed: 400,
	// initialSlide: index,
	// slidesPerView: 1,
	spaceBetween: 100,
	nextButton: ".swiper-button-next",
	prevButton: ".swiper-button-prev",
});

$(".album-box").click(function() {
	var index = $(this).index(".album-box");
	// alert(index);

	// albumSwiper.slideTo(index,400);

	$(".album-full-screen").css({"z-index":"1"}).transition({"opacity":"1"},300);
	$(".photo-album-swiper,.swiper-button-next,.swiper-button-prev").click(function() {
		return false;
	});
	$(".album-full-screen").click(function() {
		$(this).transition({"opacity":"0"},300,function() {
			$(this).css({
				"z-index" : "-1"
			});
		});
	});

});