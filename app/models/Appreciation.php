<?php

class Appreciation extends Eloquent{

	protected $table = 'appreciations';

	protected $fillable = array(
		'id',
		'title',
		'video',
		'video_img',
		'created_at'
	);

}