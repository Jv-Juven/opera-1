<?php 

return array(
	'title' => '认证老师',

	'single' => '认证老师',

	'model' => 'User', 

	'columns' =>array(
		'avatar' => array(
			'title' => '头像',
			'output' => '<img src="/images/admin/authentications/(:value)" height="100" />',
		),
		'realname' => array(
			'title' => '真实姓名',
		),
		'city' => array(
			'title' => '所在省份'
		),
		'identity' => array(
			'title' => '身份分类',
		),
	),

	'edit_fields'=>array(
		'avatar' => array(
			'title' => '头像',
			'type' => 'image',
			'location' => public_path().'/images/admin/authentications/',
			'naming' => 'keep'
		),
		'realname' => array(
			'title' => '真实姓名',
		),
		'city' => array(
			'title' => '所在省份',
			'type' => 'enum',
			'options' => array(
				'北京市','天津市','河北省','陕西省','内蒙古自治区','辽宁省','吉林省','黑龙江省','上海市',
				'江苏省','浙江省','安徽省','福建省','江西省','山东省','河南省','湖北省','湖南省',
				'广东省','广西壮族自治区','海南省','重庆市','四川省','贵州省','云南省',
				'西藏自治区','陕西省','甘肃省','青海省','宁夏回族自治区','新疆维吾尔自治区','台湾省',
				'香港特别行政区', '澳门特别行政区','海外','其他'
				),
		),
		'identity'=>array(
			'title' => '身份分类',
			'type' => 'enum',
			'options' => array(
				'1',
				'2',
				'3',
				'4',
				'5'
				),
		),
	),

	'rules' => array(
		'avatar' => 'required',
		'realname' => 'required',
		'city' => 'required'
	),

	'messages' => array(
		'avatar.required' => '请添加头像！',
		'realname.required' => '请填写名字！',
		'city.required' => '请填写其所在省份！'
	), 

	'filters' => array(
		'realname' => array(
			'title' => '真实姓名',
		),
	),

	'query_filter'=> function($query)
	{
		$query->where('role_id', '=' , 0);
	},
);