<?php 

return array(
	'title' => '戏剧百家',

	'single' => '戏剧百家',

	'model' => 'Teacher',

	'columns' => array(
		'avatar' => array(
			'title' => '头像',
			'output' => '<img src="/images/admin/teachers/(:value)" height="100" />',
		) ,
		'chinese_name' => array(
			'title' => '中文名字'
		),
		// 'foreign_name' => array(
		// 	'title' => '外文名字'
		// ),
		// 'country' => array(
		// 	'title' => '国籍'
		// ),
		// 'nation' => array(
		// 	'title' => '民族'
		// ),
		// 'birthplace' => array(
		// 	'title' => '出生地'
		// ),
		// 'position' => array(
		// 	'title' => '职业'
		// ),
		// 'social_post' => array(
		// 	'title' => '社会公职'
		// ),
		// 'production' => array(
		// 	'title' => '代表作品'
		// ),
		// 'per_description' => array(
		// 	'title' => '简介'
		// ),
	),

	'edit_fields' => array(
		'avatar' => array(
			'title' => '头像',
			'type' =>'image', 
			'location' => public_path().'/images/admin/teachers/'
		) ,
		'chinese_name' => array(
			'title' => '中文名字'
		),
		'foreign_name' => array(
			'title' => '外文名字'
		),
		'country' => array(
			'title' => '国籍'
		),
		'nation' => array(
			'title' => '民族'
		),
		'birthplace' => array(
			'title' => '出生地'
		),
		'position' => array(
			'title' => '职业'
		),
		'social_post' => array(
			'title' => '社会公职'
		),
		'production' => array(
			'title' => '代表作品'
		),
		'per_description' => array(
			'title' => '简介',
			'type' => 'textarea'
 		),
	),

	'filters' => array(
		'chinese_name' => array(
			'title' => '中文名字'
		),
	),
);