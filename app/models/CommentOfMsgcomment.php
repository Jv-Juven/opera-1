<?php

class CommentOfMsgcomment extends Eloquent{

	protected $table = 'comment_of_msgcomment';

	protected $fillable = array(
		'sender_id',
		'receiver_id',
		'messagecomment_id',
		'content'
	);
}