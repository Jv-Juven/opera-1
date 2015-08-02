

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
	var id = $(".album-box").attr("data-id");
	$.get("/user/picture/",{
		album_id : id
	},function(data){

		for(var pic in data["pictures"]){
			console.log(data["pictures"][pic].picture);
			var url = data["pictures"][pic].picture,
			    div = $('<div class="swiper-slide"></div>').appendTo($(".photo-album-swiper .swiper-wrapper")),
			    img = $("<img />",{
			    	src: url
			    }).appendTo(div);
		}
		albumSwiper.update();
		albumSwiper.slideTo(0,0)
	},"json");
	// alert(index);

	// albumSwiper.slideTo(index,400);
	$(".album-full-screen").fadeIn();
	// $(".album-full-screen").css({"z-index":"99"}).transition({"opacity":"1"},300);
	// $(".photo-album-swiper,.swiper-button-next,.swiper-button-prev").click(function() {
	// 	return false;
	// });

});


$(".album-full-screen .video-close").click(function() {
	// $(".album-full-screen").transition({"opacity":"0"},300,function() {
	// 	$(this).css({
	// 		"z-index" : "-99"
	// 	});

	// 	$(".photo-album-swiper .swiper-wrapper").html("");
	// });

    $(".album-full-screen").fadeOut(300,function(){
    	$(".photo-album-swiper .swiper-wrapper").html("");
    });
    
});


