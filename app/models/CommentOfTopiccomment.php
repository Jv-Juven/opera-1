<?php

class CommentOfTopiccomment extends Eloquent{

	protected $table = 'comment_of_topiccomments';

	protected $fillable = array(
		'user_id',
		'topiccomment_id',
		'content'
		);
}