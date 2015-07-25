<?php 

return array(
	'title' => '经典欣赏',

	'single' => '经典欣赏',

	'model' => 'Appreciation',

	'columns' => array(
		'title' => array(
			'title' => '视频名字'
		),
		'content' => array(
			 'title' => '视频连接'
		),
	),

	'edit_fields' => array(
		'title' => array(
			'title' => '题目'
		),
		'content' => array(
			 'title' => '内容',		
		),
	),

	'rules' => array(
			'title' => 'required',
			'content' => 'required'
	),

	'messages' => array(
		'title.required' => '请添加视频名字！',
		'content.required' => '请添加链接地址！',
	),

);