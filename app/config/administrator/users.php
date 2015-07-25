<?php

return array(
	'title' => '用户',

	'single' => '用户',

	'model' => 'User',

	'columns' => array(
		'username' => array(
			'title' => '用户名',
		),
		'email' =>  array(
			'title' => '邮箱'
		),
		'avatar' => array(
			'title' => '头像',
			'limit' => 2
		),
		'realname' => array(
			'title' => '真实姓名'
		),
		'gender' => array(
			'title' => '性别'
		),
		'city' => array(
			'title' => '所在城市'
		),
		'identity' => array(
			'title' => '身份分类'
		),
		'position' => array(
			'title' => '职位'
		),
	),

	'edit_fields' => array(
		'username' => array(
			'title' => '用户名'
		),
		'email' =>  array(
			'title' => '邮箱'
		),
		'password' => array(
			'title' => '密码',
			'type' => 'password'
		),
		'interests' => array(
			'title' => '兴趣'
		),
		'per_description' => array(
			'title' => '个人简介'
		),
	),
);