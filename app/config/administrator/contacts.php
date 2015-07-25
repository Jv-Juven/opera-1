<?php

return array(

	'title' => '联系我们',

	'single' => '联系我们',

	'model' => 'ContactUs',

	'columns' => array(
		'id' => array(
			 'title' => 'ID'
		),
		'number' => array(
			'title' => '联系电话'
		),
		'people' => array(
			'title' => '联系人'
		),
		'postcode' => array(
			'title' => '邮政编码'
		),
		'address' => array(
			'title' => '网址'
		),
		'site' => array(
			'title' => '地址'
		)
	),

	'edit_fields' => array(
		'number' => array(
			'title' => '联系电话'
		),
		'people' => array(
			'title' => '联系人'
		),
		'postcode' => array(
			'title' => '邮政编码'
		),
		'address' => array(
			'title' => '网址'
		),
		'site' => array(
			'title' => '地址'
		)
	),

	'rules' => array(
		'number' 	=> 'required|numeric',
		'people' 	=> 'required',
		'postcode' 	=> 'required|numeric',
		'address' 	=> 'required',
		'site' 		=> 'required'
		),
	
	'messages' => array(
		'required' 		=> '信息填写不完整！',
		'number.numeric' 	=> '电话号码必须为数字！',
		'postcode.numeric'	=> '邮编必须为数字！',
		),
);