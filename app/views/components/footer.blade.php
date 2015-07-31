<footer>
	<div id="footer" class="clearx">
		<span class="sub-title footer-icon">友情链接：</span>
		@if(!empty($links))
			@foreach($links as $link)
		<a href="{{$link->link}}" class="footer-icon"><img src="/images/admin/links/{{$link->image}}" class="logos" alt="logos"></a>
			@endforeach
		@endif
		
		
	</div>
	<div id="icp_container">
		<span>Copyright©中国儿童戏剧教育网版权所有</span>
		<span style="padding-left:20px;">技术支持： <a href="http://zerioi.com" class="company-link">广州紫睿科技有限公司</a></span>
	</div>
	<div class="clear"></div>

</footer>
