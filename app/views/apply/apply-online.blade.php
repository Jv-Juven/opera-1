@extends('layouts.subpage')

@section('title')
	<title>在线报名</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/apply/apply-online/apply-online.css">
@stop


@section('page-left-nav')
	@include('components.left-nav.apply-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		<div class="apply-tr">
			<div class="apply-td-text">
				<span class="apply-text apply-must">姓名：</span>
			</div>
			<input id="apply_name" class="apply-td-input" type="text"/>
		</div>
		<div class="apply-tr">
			<div class="apply-td-text">
				<span class="apply-text">性别：</span>
			</div>
			<div class="apply-td-input" type="text">
				<div class="radio-container">
					<input id="man" name="sex" value="0" type="radio"/>
					<label for="man">男</label>
				</div>
				<div class="radio-container">
					<input id="woman" name="sex" value="1" type="radio"/>
					<label for="woman">女</label>
				</div>
			</div>
		</div>
		<div class="apply-tr">
			<div class="apply-td-text">
				<span class="apply-text">出生年月：</span>
			</div>
			<input id="born_year" class="apply-td-input born-date" type="text" />
			<span class="born-date-text">年</span>
			<input id="born_month" class="apply-td-input born-date" type="text" />
			<span class="born-date-text">月</span>
			<input id="born_day" class="apply-td-input born-date" type="text" />
			<span class="born-date-text">日</span>
		</div>
		<div class="apply-tr">
			<div class="apply-td-text">
				<span class="apply-text">籍贯：</span>
			</div>
			<input id="native_place" class="apply-td-input" type="text" style="width:160px;"/>
		</div>
		<div class="apply-tr">
			<div class="apply-td-text">
				<span class="apply-text">居住地址：</span>
			</div>
			<input id="apply_addr" class="apply-td-input" type="text" style="width:410px;"/>
		</div>
		<div class="apply-tr">
			<div class="apply-td-text">
				<span class="apply-text">监护人：</span>
			</div>
			<input id="guardian" class="apply-td-input" type="text"  style="width:220px;"/>
		</div>
		<div class="apply-tr">
			<div class="apply-td-text">
				<span class="apply-text apply-must">手机：</span>
			</div>
			<input id="apply_phone" class="apply-td-input" type="text"  style="width:220px;"/>
		</div>
		<div class="apply-tr">
			<div class="apply-td-text">
				<span class="apply-text">单位：</span>
			</div>
			<input id="apple_unit" class="apply-td-input" type="text" style="width:330px;"/>
		</div>
		<div class="apply-tr">
			<div class="apply-td-text">
				<span class="apply-text">职务：</span>
			</div>
			<input id="apply_job" class="apply-td-input" type="text" style="width:330px;"/>
		</div>
		<div class="apply-tr">
			<div class="apply-td-text">
				<span class="apply-text">QQ：</span>
			</div>
			<input id="qq" class="apply-td-input" type="text" style="width:220px;"/>
		</div>
		<div class="apply-tr">
			<div class="apply-td-text">
				<span class="apply-text">所在学校：</span>
			</div>
			<input id="apply_school" class="apply-td-input" type="text" style="width:420px;"/>
		</div>
		<div class="apply-tr">
			<div class="apply-td-text">
				<span class="apply-text">邮编：</span>
			</div>
			<input id="apply_postcode" class="apply-td-input" type="text" style="width:220px;"/>
		</div>
		<div class="apply-tr">
			<div class="apply-td-text">
				<span class="apply-text">京剧培训单位：</span>
			</div>
			<input id="train_unit" class="apply-td-input" type="text" style="width:420px;"/>
		</div>
		<div class="apply-tr">
			<div class="apply-td-text">
				<span class="apply-text">行当：</span>
			</div>
			<input id="apply_trade" class="apply-td-input" type="text" style="width:220px;"/>
		</div>
		<div class="apply-tr">
			<div class="apply-td-text">
				<span class="apply-text">学戏时间：</span>
			</div>
			<input id="learn_time" class="apply-td-input" type="text" style="width:220px;"/>
		</div>
		<div class="apply-tr">
			<div class="apply-td-text">
				<span class="apply-text">详细说明：</span>
			</div>
			<textarea id="apply_details" name="" class="apply-td-explain" cols="60" rows="10"></textarea>
		</div>
	
	
		<div class="apply-btn-container"> 
			<span>提交发表</span>
			<span>重新填写</span>
			<span>返回上一页</span>
		</div>
	</div>
@stop

@section('js')
    @parent
    <!-- // <script type="text/javascript"></script> -->
@stop


