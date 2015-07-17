<?php

class Album extends Eloquent{
	
	protected $table = 'albums';

	protected $fillable =array(
		'id',
		'user_id',
		'title',
		'created_at'
	);

	//照片
	public function hasManyPictures()
	{
		return $this->hasMany('Picture', 'album_id', 'id');
	}
}