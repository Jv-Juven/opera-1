<?php

class CommentOfMsgcomment extends Eloquent{

	protected $table = 'comment_of_msgcomment';

	protected $fillable = array(
		'user_id',
		'messagecomment_id',
		'content'
	);
}