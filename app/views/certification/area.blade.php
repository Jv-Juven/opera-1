@extends('layouts.subpage')

@section('title')
	<title>按照地区分类</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/certification/certification.css">
	<link rel="stylesheet" href="/dist/css/certification/identity/identity.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.certificate-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		<div class="certificate-nav-container">
			<ul>
				<li class="active"><a href="/customer/authentication/city">全部</a> </li>
				<li><a href="/customer/authentication/city/0">北京市</a></li>
				<li><a href="/customer/authentication/city/1"天津市>天津市</a></li>
				<li><a href="/customer/authentication/city/2">河北省</a></li>
				<li><a href="/customer/authentication/city/3">山西省</a></li>
				<li><a href="/customer/authentication/city/4">内蒙古自治区</a></li>
				<li><a href="/customer/authentication/city/5">辽宁省</a></li>
				<li><a href="/customer/authentication/city/6">吉林省</a></li>
				<li><a href="/customer/authentication/city/7">黑龙江省</a></li>
				<li><a href="/customer/authentication/city/8">上海市</a></li>
				<li><a href="/customer/authentication/city/9">江苏省</a></li>
				<li><a href="/customer/authentication/city/10">浙江省</a></li>
				<li><a href="/customer/authentication/city/11">安徽省</a></li>
				<li><a href="/customer/authentication/city/12">福建省</a></li>
				<li><a href="/customer/authentication/city/13">江西省</a></li>
				<li><a href="/customer/authentication/city/14">山东省</a></li>
				<li><a href="/customer/authentication/city/15">河南省</a></li>
				<li><a href="/customer/authentication/city/16">湖北省</a></li>
				<li><a href="/customer/authentication/city/17">湖南省</a></li>
				<li><a href="/customer/authentication/city/18">广东省</a></li>
				<li><a href="/customer/authentication/city/19">广西壮族自治区</a></li>
				<li><a href="/customer/authentication/city/20">海南省</a></li>
				<li><a href="/customer/authentication/city/21">重庆市</a></li>
				<li><a href="/customer/authentication/city/22">四川省</a></li>
				<li><a href="/customer/authentication/city/23">贵州省</a></li>
				<li><a href="/customer/authentication/city/24">云南省</a></li>
				<li><a href="/customer/authentication/city/25">西藏自治区</a></li>
				<li><a href="/customer/authentication/city/26">陕西省</a></li>
				<li><a href="/customer/authentication/city/27">甘肃省</a></li>
				<li><a href="/customer/authentication/city/28">青海省</a></li>
				<li><a href="/customer/authentication/city/29">宁夏回族自治区</a></li>
				<li><a href="/customer/authentication/city/30">新疆维吾尔自治区</a></li>
				<li><a href="/customer/authentication/city/31">台湾省</a></li>
				<li><a href="/customer/authentication/city/32">香港特别行政区</a></li>
				<li><a href="/customer/authentication/city/33">澳门特别行政区</a></li>
				<li><a href="/customer/authentication/city/34">海外</a></li>
				<li><a href="/customer/authentication/city/35">其他</a></li>

			</ul>
		</div>
		<div class="certificate-container">
			<div class="certificate-users-container">
				@if(count($area) > 1)	
					@foreach($area as $key=>$users)
				<div class="certificate-users-head">{{$key}} （{{count($users)}}）</div>
				<ul>
						@foreach($users as $user)
						<li>
							<div class="certificate-head-portrait">
								<a href="/user/space_home?user_id={{$user->id}}">
									<img src="/images/admin/authentications/{{$user->avatar}}" alt="">
								</a>	
							</div>
							<div class="certificate-user-name">{{$user->realname}}</div>
						</li>
						@endforeach
				</ul>
					@endforeach
				@endif

				@if(count($area) == 1)	
				<div class="certificate-users-head">{{$area[0]->city}} （{{count($area)}}）</div>
				<ul>
						@foreach($area as $user)
						<li>
							<div class="certificate-head-portrait">
								<a href="/user/space_home?user_id={{$user->id}}">	
									<img src="/images/admin/authentications/{{$user->avatar}}" alt="">
								</a>
							</div>
							<div class="certificate-user-name">{{$user->realname}}</div>
						</li>
						@endforeach
				</ul>
				@endif
			</div>
		</div>
	</div>
@stop

@section('js')
	@parent
	<!-- // <script type="text/javascript" src="/src/js/pages/certificate/identity.js"></script> -->
@stop