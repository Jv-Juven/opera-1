<?php

return array(
	'title' => '成绩录入',

	'single' => '成绩录入',

	'model' => 'Application',

	'columns' => array(
		'scorenumber' => array(
			'title' => '编号'
		),
		'name' => array(
			'title' => '姓名'
		),
		//分数查询
		'score' => array(
			'title' => '分数'
		),
		'score_details' => array(
			'title' => '分数详情'
		),
	),

	'edit_fields' => array(
		'name' => array(
			'title' => '姓名'
		),
		'gender' => array(
			'title' => '性别'
		),
		'year' => array(
			'title' => '出生年' 
		),
		'month' => array(
			'title' => '出生月'
		),
		'day' => array(
			'title' => '出生日'
		),
		'hometown' => array(
			'title' => '籍贯'
		),
		'address' => array(
			'title' => '居住地址'
		),
		'guardian' => array(
			'title' => '监护人'
		),
		'phone' => array(
			'title' => '手机'
		),
		'unit' => array(
			'title' => '单位'
		),
		'position' => array(
			'title' => '职务'
		),
		'QQ' => array(
			'title' => 'QQ'
		),
		'school' => array(
			'title' => '所在学校'
		),
		'postcode' => array(
			'title' => '邮编'
		),
		'trainingunit' => array(
			'title' => '培训单位'
		),
		'profession' => array(
			'title' => '行当'
		),
		'timeoflearn' => array(
			'title' => '学戏时间'
		),
		'details' => array(
			'title' => '详细说明',
			'type' => 'textarea'
		),
		'score' => array(
			'title' => '分数'
		),
		'score_details' => array(
			'title' => '分数详情'
		),
	),

	'filters' => array(
		'scorenumber' => array(
			'title' => '编号'
		),
		'name' => array(
			'title' => '姓名'
		),
	),
);