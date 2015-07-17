<?php

class MessageComment extends Eloquent{

	protected $table = 'message_comments';

	protected $fillable = array(
		'id',
		'user_id',
		'message_id',
		'content',
		'created_at'
	);

}