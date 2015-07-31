@extends('layouts.subpage')


@section('title')
	<title>话题动态</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/userCenter/dynamic/dynamic.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.userCenter-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		@foreach($topics as $topic)
		<div class="topic">
			<div>
				<p class="title">
					{{{$topic->title}}}
					<span class="time">{{{$topic->created_at}}}</span>
				</p>
			</div>
			<div>
				<p class="content">{{{$topic->content}}}</p>
			</div>
			<div>
				<p class="comment-wrapper">
					<a class="show-comments-btn" href="javascript:void(0);">
						<img src="/images/userCenter/comment.png">
					
						<span class="comment-count">
							(<span class="number">{{{$topic->commentsCount}}}</span>)个评论
						</span>
					</a>

					<div class="comments">
						<div class="comment">
							<div class="comment-item">
								<img class="author-avatar" src="http://7sbxao.com1.z0.glb.clouddn.com/login.jpg" width="50" height="50" />
								<div class="commment-info"> 
									<span class="author-name">黄小明</span>
								 	 ： 
									<span class="comment-content">《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物</span>
									<div class="comment-operate">
										<span class="comment-time">7月6日 19:36</span>
										<a class="reply-btn" href="javascript:void(0);">回复</a>
									</div>
								</div>
								<div style="clear:both;"></div>
							</div>
							<div class="replies">
								<div class="reply">
									<img class="author-avatar" src="http://7sbxao.com1.z0.glb.clouddn.com/login.jpg" width="50" height="50" />
									<div class="reply-info"> 
										<span class="author-name">黄小明</span>
									 	 ： 
										<span class="reply-content">《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物</span>
										<div class="reply-operate">
											<span class="reply-time">7月6日 19:36</span>
											<a class="reply-btn" href="javascript:void(0);">回复</a>
										</div>
									</div>
									<div style="clear:both;"></div>
								</div>
								<div class="reply">
									<img class="author-avatar" src="http://7sbxao.com1.z0.glb.clouddn.com/login.jpg" width="50" height="50" />
									<div class="reply-info"> 
										<span class="author-name">黄小明</span>
									 	 ： 
										<span class="reply-content">《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物</span>
										<div class="reply-operate">
											<span class="reply-time">7月6日 19:36</span>
											<a class="reply-btn" href="javascript:void(0);">回复</a>
										</div>
									</div>
									<div style="clear:both;"></div>
								</div>
								<div class="reply">
									<img class="author-avatar" src="http://7sbxao.com1.z0.glb.clouddn.com/login.jpg" width="50" height="50" />
									<div class="reply-info"> 
										<span class="author-name">黄小明</span>
									 	 ： 
										<span class="reply-content">《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物</span>
										<div class="reply-operate">
											<span class="reply-time">7月6日 19:36</span>
											<a class="reply-btn" href="javascript:void(0);">回复</a>
										</div>
									</div>
									<div style="clear:both;"></div>
								</div>
							</div>
						</div>
						<div class="comment">
							<div class="comment-item">
								<img class="author-avatar" src="http://7sbxao.com1.z0.glb.clouddn.com/login.jpg" width="50" height="50" />
								<div class="commment-info"> 
									<span class="author-name">黄小明</span>
								 	 ： 
									<span class="comment-content">《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物《苏三起解》因话本和戏剧闻名的苏三，在中国是一个家喻户晓的人物</span>
									<div class="comment-operate">
										<span class="comment-time">7月6日 19:36</span>
										<a class="reply-btn" href="javascript:void(0);">回复</a>
									</div>
								</div>
								<div style="clear:both;"></div>
							</div>
							<div class="replies">
						</div>
					</div>
				</p>
			</div>
		</div>
		@endforeach

	</div>
@stop

@section("js")
    @parent
    <script type="text/javascript" src="/dist/js/pages/dynamic.js"></script>
@stop