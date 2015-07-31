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
		<div class="page-img" id="avatar_container">
			<div class="img">
				<img class="avatar" src="{{{$user->avatar}}}">
			</div>
			<div class="img-char">
				<img class="avatar-btn avatar-change" src="/images/userCenter/change_pic.png">
				<span class="avatar-char avatar-change">更换头像</span>
				<input type="file" id="change_avatar"/>
			</div>	
		</div>
		<input id="des_id" type="hidden" value="{{$user->id}}" />
		<div class="information-container clearx">
			<div class="p name">
				<span class="name-field">真实姓名:</span>
				<span class="name-info noedit-status">{{{$user->realname}}}</span>
				<input id="info_name" class="name-info edit-status" type="text" value="{{{$user->realname}}}"></input>
				<div class="edit-click clearx">
					<span class="edit-info noedit-status">修改资料</span>
					<img class="edit-btn noedit-status" src="/images/userCenter/change_info.png">
					
				</div>
				
			</div>
			<div class="p gender">
				<span class="name-field">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别:</span>
				@if($user->gender == 0)
				<span class="name-info noedit-status">男</span>
				@elseif($user->gender ==1)
				<span class="name-info noedit-status">女</span>
				@elseif($user->gender == 2)
				<span class="name-info noedit-status"></span>
				@endif

				<span class="radio-container edit-status">
					<input type="radio" name="sex" id="male" value="0" />
					<label for="male">
						男
					</label>
					<input type="radio" name="sex" id="female" value="1" />
					<label for="female">
						女
					</label>
					
				</span>

			</div>
			<div class="p position">
				<span class="name-field">职&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;位:</span>
				<span class="name-info noedit-status">{{{$user->postion}}}</span>
				<input id="info_job" class="name-info edit-status" type="text" value="{{{$user->postion}}}"></input>
			</div>
			<div class="p city">
				<span class="name-field">所在城市:</span>
				<span class="name-info noedit-status">{{{$user->city}}}</span>
				<!-- <input id="info_city" class="name-info edit-status" type="text" value="{{{$user->city}}}"></input> -->
				<select id="info_city" class="name-info edit-status">
					<option>北京市</option>
					<option>天津市</option>
					<option>河北省</option>
					<option>山西省</option>
					<option>内蒙古自治区</option>
					<option>辽宁省</option>
					<option>吉林省</option>
					<option>黑龙江省</option>
					<option>上海市</option>
					<option>江苏省</option>
					<option>浙江省</option>
					<option>安徽省</option>
					<option>福建省</option>
					<option>江西省</option>
					<option>山东省</option>
					<option>河南省</option>
					<option>湖北省</option>
					<option>湖南省</option>
					<option selected="selected">广东省</option>
					<option>广西壮族自治区</option>
					<option>海南省</option>
					<option>重庆市</option>
					<option>四川省</option>
					<option>贵州省</option>
					<option>云南省</option>
					<option>西藏自治区</option>
					<option>陕西省</option>
					<option>甘肃省</option>
					<option>青海省</option>
					<option>宁夏回族自治区</option>
					<option>新疆维吾尔自治区</option>
					<option>台湾省</option>
					<option>香港特别行政区</option>
					<option>澳门特别行政区</option>
					<option>海外</option>
					<option>其他</option>
				</select>
			</div>
			<div class="p internets">
				<span class="name-field">兴&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;趣:</span>
				<span class="name-info noedit-status">{{{$user->interests}}}</span>
				<input id="info_interest" class="name-info edit-status" type="text" value="{{{$user->interests}}}"></input>
			</div>
			<div class="per-description">
				<span class="name-field">我的简介:</span>
				<span class="name-info noedit-status">
					{{{$user->per_description}}}
				</span>
				<textarea id="info_txtarea" class="name-info edit-status" cols="30" rows="18">{{{$user->per_description}}}</textarea>
			</div>
		</div>

		<div class="information-btns-containers clearx edit-status">
			<span id="info_cancel" class="info-btn">取消修改</span>
			<span id="info_confirm" class="info-btn">提交修改</span>
		</div>
	</div>

@stop


@section("js")
    @parent
    <script type="text/javascript" src="/dist/js/lib/plugins/qiniu.min.js"></script>
    <script type="text/javascript" src="/dist/js/lib/plugins/plupload.full.min.js"></script>
    <script type="text/javascript" src="/dist/js/pages/information.js"></script>
@stop









