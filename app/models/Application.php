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
		'guardian'
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
		'created_at'
	);

}