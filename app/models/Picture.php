<?php

class Picture extends Eloquent{
	
	protected $table = 'pictures';

	protected $fillable =array(
		'id',
		'album_id',
		'title',
		'picture',
		'created_at'
	);

	public function album()
    {
        return $this->belongsTo('Album');
    }
}