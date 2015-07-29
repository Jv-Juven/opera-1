<?php

return array(
	'title' 	=> '友情链接',

	'single' => '友情链接',

	'model' => 'Link',

	'columns' => array(
		'image' => array(
			'title' => '网站logo',
			'output' => '<img src="/images/admin/links/(:value)" height="100" />',
		),
		'link' =>  array(
			'title' => '链接',
		),
	),

	'edit_fields' => array(
		'image' => array(
			'title' => '网站logo',
			'type' => 'image',
			'location' => public_path().'/images/admin/links/',
			'naming' =>'keep'
		),
		'link' =>  array(
			'title' => '链接',
		),
 	),

 	'rules' => array(
			'link' => 'required',
			'image' => 'required'
		),

	'messages' => array(
		'link.required' => '请添加网页链接！',
		'image.required' => '请上传图片！',
		'image.image' => '必须为jpeg, png, bmp 或 gif的图片格式！' 

	),

);

