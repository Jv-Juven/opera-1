<?php
class EnlightenColumn extends Eloquent{
	
	protected $table = 'enlighten_columns';//启蒙专栏

	protected $fillable = array(
		'id',
		'title',
		'content',
		'created_at'
	);
}