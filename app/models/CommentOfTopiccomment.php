<?php

class CommentOfTopiccomment extends Eloquent{

	protected $table = 'comment_of_topiccomments';

	protected $fillable = array(
		'sender_id',
		'receiver_id',
		'topiccomment_id',
		'topic_id',
		'content'
		);
}