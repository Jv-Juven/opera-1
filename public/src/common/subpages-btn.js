$('.pagination').addClass('enlighten-subpage-plugin').children().css({
  'padding': '5px 10px',
  'cursor': 'pointer'
}).filter('.active').find('span').css({
  'color': '#C80000'
});
$('.pagination li:nth-child(1)').text('上一页');
$('.pagination li:nth-last-child(1)').text('下一页');
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