<?php 

return array(
	'title' => '经典欣赏',

	'single' => '经典欣赏',

	'model' => 'Appreciation',

	'columns' => array(
		'title' => array(
			'title' => '视频名字'
		),
		'video' => array(
			 'title' => '视频连接'
		),
		'video_img'=>array(
			'title' => '视频图片',
			'output' => '<img src="/images/admin/classic/(:value)" height="100" />',
		),
	),

	'edit_fields' => array(
		'title' => array(
			'title' => '题目'
		),
		'video' => array(
			 'title' => '视频链接',		
		),
		'video_img'=>array(
			'title' => '视频图片',
			'type' => 'image',
			'location' => public_path().'/images/admin/classic/',
			'naming' =>'keep'
		),
	),

	'rules' => array(
			'title' => 'required',
			'video' => 'required',
			'video_img' =>'required'
	),

	'messages' => array(
		'title.required' => '请添加视频名字！',
		'video.required' => '请添加链接地址！',
		'video_img.required' => '请添加视频图片'
	),

);