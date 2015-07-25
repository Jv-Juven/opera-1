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
	),

	'edit_fields' => array(
		'image' => array(
			'title' => '海报',
			'type' => 'image',
			'location' => public_path().'/images/admin/posters/'
		),
	),




);