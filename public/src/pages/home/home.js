;(function($){
	var mySwiper = new Swiper ('.home-swiper-container', {
	   direction: 'horizontal',
	   speed: 400,
	   loop: true,
	   autoplay: 3000,
	   effect: "slide",
	   paginationClickable: true,
	   
	   // 如果需要分页器
	   pagination: '.swiper-pagination',
	   
	   // 如果需要前进后退按钮
	   // nextButton: '.swiper-button-next',
	   // prevButton: '.swiper-button-prev',
	   
	   // 如果需要滚动条
	   // scrollbar: '.swiper-scrollbar',
	 });
	
})(jQuery);