@extends('admin.layout')

@section('title')
    <title>后台管理－轮播海报</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/admin/home/contact-us.css">
@stop

@section('admin-header-nav')
    @include('components.admin-header-nav.home-header-nav')
@stop

@section('admin-content')
	<div class="admin-content contact-us-content">
		<div class="item-row">
			<label>联系方式：</label>
			<input type="text" name="contact-way" id="contact-way" />
		</div>
		<div class="item-row">
			<label>联系人：</label>
			<input type="text" name="contact-person" id="contact-person" />
		</div>
		<div class="item-row">
			<label>邮政编码：</label>
			<input type="text" name="zipcode" id="zipcode" />
		</div>
		<div class="item-row">
			<label>网址：</label>
			<input type="text" name="url" id="url" />
		</div>
		<div class="item-row">
			<label>地址：</label>
			<input type="text" name="address" id="address" />
		</div>
		<div>
			<input type="button" id="modify-btn" value="修改" />
			<input type="button" id="save-btn" value="保存" />
		</div>
	</div>
@stop

@section('js')
	@parent
    <script type="text/javascript" src='/dist/js/pages/admin/home/contact-us.js'></script>
@stop
