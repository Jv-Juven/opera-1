<?php 

return array(

	'title' => '招贤纳士',

	'single' => '招贤纳士',

	'model' => 'Employment',

	'columns' => array(
		'title' => array(
			'title' => '题目'
		),
		'created_at' => array(
			'title' => '更新时间'
		),
	),

	'edit_fields' => array(
		'title' => array(
			'title' => '题目'
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
			'title' => '题目'
		),
	),

	'form_width' => 800,
);