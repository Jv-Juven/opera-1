<?php

class Message extends Eloquent{

	protected $table = 'messages';

	protected $fillable = array(
		'id',
		'reciever_id'
		'sender_id',
		'content',
		'created_at'
	);

	public function MessageComments()
	{
		return $this->hasMany('MessageComment','message_id', 'id');
	}
}