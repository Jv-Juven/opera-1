<?php

class Album extends Eloquent{
	
	protected $table = 'albums';

	protected $fillable =array(
		'id',
		'user_id',
		'title',
		'albumCount',
		'picture',
		'created_at'
	);

	//照片
	public function hasManyPictures()
	{
		return $this->hasMany('Picture', 'album_id', 'id');
	}
}