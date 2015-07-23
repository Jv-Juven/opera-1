<?php

class Employment extends Eloquent{

	protected $table = 'employments';

	protected $fillable = array(
		'title',
		'content'
	);
}