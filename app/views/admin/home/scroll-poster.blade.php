@extends('admin.layout')

@section('title')
    <title>后台管理－轮播海报</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/admin/home/scroll-poster.css">
@stop

@section('admin-header-nav')
    @include('components.admin-header-nav.home-header-nav')
@stop

@section('admin-content')
	<div class="scroll-poster-content admin-content">
		<div class="link-list">
			<div class="link-item">
				<div class="item-img-wrapper">
					<img src="aaa.jpg" class="item-img" width="100" height="100" />
				</div>
				<div class="item-content">
					<div class="size-wrapper">
						图片尺寸为：<span></span> * <span></span>
					</div>
					<div class="link-wrapper">
						<input type="text" class="item-link" placeholder="http:// ...." />
					</div>
					<div class="operate-btn">
						<a href="" class="edit-btn">编辑</a>
						<a href="" class="delete-btn">删除</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js')
	@parent
    <script type="text/javascript" src='/dist/js/pages/admin/home/scroll-poster.js'></script>
@stop
