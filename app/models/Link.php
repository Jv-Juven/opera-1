<?php

class Link extends Eloquent{
	
	protected $table = 'links';

	protected $fillable = array(
		'image',
		'link',
		 'created_at'
		);
}