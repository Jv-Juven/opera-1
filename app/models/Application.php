<?php

class Application extends Eloquent{

	protected $table = 'applications';

	protected $fillable = array(
		'id',
		'name',
		'gender',
		'year',
		'month',
		'day',
		'hometown',
		'address',
		'guardian',
		'phone',
		'unit',
		'position',
		'QQ',
		'school',
		'postcode',
		'trainingunit',
		'profession',
		'timeoflearn',
		'details',
		//分数查询
		'scorenumber',
		'score',
		'score_details',
		'created_at'
	);

}