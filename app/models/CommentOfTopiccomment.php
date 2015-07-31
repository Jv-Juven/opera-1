<?php

class CommentOfTopiccomment extends Eloquent{

	protected $table = 'comment_of_topiccomments';

	protected $fillable = array(
		'seeder_id',
		'receiver_id',
		'topiccomment_id',
		'content'
		);
}