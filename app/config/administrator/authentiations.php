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
				'江苏','浙江','安徽','福建','江西','山东','上海','台湾',
				'广东','广西','海南','香港','澳门',
				'河北','山西','北京','天津','内蒙古',
				'湖北','湖南','河南',
				'辽宁','吉林','黑龙江',
				'四川','云南','贵州','重庆','西藏','陕西',
				'宁夏', '新疆','青海','甘肃'
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