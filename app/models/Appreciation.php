<?php

class Appreciation extends Eloquent{

	protected $table = 'appreciationvideos';

	protected $fillable = array(
		'id',
		'title',
		'video',
		'created_at'
	);

}