@extends('layouts.subpage')


@section('title')
	<title>个人资料</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/userCenter/information/information.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.userCenter-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		<div class="page-img">
			<div class="img">
				<img class="avatar" src="images/userCenter/avatar.png">
			</div>
			<div class="img-char">
					<img class="avatar-btn" src="images/userCenter/更换头像.png">
					<span class="avatar-char">更换头像</span>
			</div>	
		</div>

		<div>
			<p class="name">
				<span class="name-field">真实姓名:</span><span class="name-info">王小明</span>
				<img class="edit-btn" src="images/userCenter/修改资料.png">
				<span class="edit-info">修改资料</span>
			</p>
			<p class="gender">
				<span class="name-field">性&nbsp;&nbsp;别:</span><span class="name-info">男</span>
			</p>
			<p class="position">
				<span class="name-field">职&nbsp;&nbsp;位:</span><span class="name-info">指导老师</span>
			</p>
			<p class="city">
				<span class="name-field">所在城市:</span><span class="name-info">广州</span>
			</p>
			<p class="internets">
				<span class="name-field">兴&nbsp;&nbsp;趣:</span><span class="name-info">昆曲</span>
			</p>
			<p class="per-description">
				<span class="name-field">我的简介:</span>
				<span class="name-info">
					王小明，男，满族，1923年2月出生。现任中国文联荣誉委员
					，中国舞蹈协会名誉主席，中国国际标准舞总会会长，中国“新
					舞蹈艺术的开拓者之一，蒙古族舞蹈艺术的奠基人，舞蹈表演艺
					术家、编导家、理论家、教育家。贾作光享有”中国舞蹈艺术大师
					的美誉，多次荣誉国家表彰。2003年，获文化部“表演技术成就奖”。
				</span>
			</p>
		</div>
	</div>

@stop