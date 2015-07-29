$(".pagination li").hide();
$(".pagination li a").css({
	"text-decoration" : "none"
});
$(".pagination li:nth-child(1)").show().addClass("zone-Pre").children().text("上一页").addClass("zone-paging-text").prepend('<img src="/images/userCenter/pre_page.png" alt="">');
$(".pagination li:nth-last-child(1)").show().addClass("zone-Next").children().text("下一页").addClass("zone-paging-text").prepend('<img src="/images/userCenter/next_page.png" alt="">');