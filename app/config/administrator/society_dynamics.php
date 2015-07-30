<?php 

return array(
	'title' => '学会动态',

	'single' => '学会动态',

	'model' => 'SocietyDynamics',

	'columns' => array(
		'title' => array(
			'title' => '标题'
		),
		'created_at' => array(
			'title' => '更新时间'
		),
	),

	'edit_fields' => array(
		'title' => array(
			'title' => '标题'
		),
		'content' => array(
			'title' => '内容',
			'type' => 'wysiwyg'
		),
	),

	'rules' =>array(
		'title' => 'required',
		'content' => 'required'
	),

	'messages' => array(
		'title.required' => '请添加文章标题！',
		'content.required' => '请添加文章内容！'
	),

	'filters' => array(
		'title' => array(
			'title' => '标题'
		),
	),

	'form_width' => 800,

);