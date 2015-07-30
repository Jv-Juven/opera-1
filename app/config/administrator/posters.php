<?php

return array(
	'title' => '海报',

	'single' => '海报',

	'model' => 'Poster',

	'columns' => array(
		'image' => array(
			'title' => '海报',
			'output' => '<img src="/images/admin/posters/(:value)" height="100" />',
		),
		'link' =>  array(
			'title' => '链接',
		),
	),

	'edit_fields' => array(
		'image' => array(
			'title' => '海报',
			'type' => 'image',
			'location' => public_path().'/images/admin/posters/',
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
		'link.required' => '请添加海报链接！',
		'image.required' => '请上传图片！',
	),



);