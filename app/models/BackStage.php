<?php

class BackStage extends Eloquent{

	protected $table = 'backstages';

	protected $fillable = array(
		'id',
		'title',
		'content',
		'created_at'
	);
}