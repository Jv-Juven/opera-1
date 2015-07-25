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
	),

	'edit_fields'=>array(
		'avatar' => array(
			'title' => '头像',
			'type' => 'image',
			'location' => public_path().'/images/admin/authentications/'
		),
		'realname' => array(
			'title' => '真实姓名',
		),
		'city' => array(
			'title' => '所在省份'
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