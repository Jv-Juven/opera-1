

var albumSwiper = new Swiper(".photo-album-swiper",{
	direction: "horizontal",
	speed: 400,
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

	$(".album-full-screen").fadeIn();

});


$(".album-full-screen .video-close").click(function() {
    $(".album-full-screen").fadeOut(300,function(){
    	$(".photo-album-swiper .swiper-wrapper").html("");
    });
});


