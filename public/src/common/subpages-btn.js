$('.pagination').css({
	"padding-top": "30px",
	"float": "right",
	"margin-right": "-12px"
}).addClass('enlighten-subpage-plugin').children().css({
  'padding': '6px 12px',
  'cursor': 'pointer'
}).filter('.active').find('span').css({
  'color': '#C80000'
});
$('.pagination li:nth-child(1)').children().text('上一页');
$('.pagination li:nth-last-child(1)').children().text('下一页');
$('.pagination .disabled').css({
	"color": "#ddd"
}).siblings().hover(function() {
	$(this).css({
		"color": "#C80000"
	});
},function() {
	$(this).css({
		"color": "#000"
	});
});
$(".pagination").fadeIn(1200);