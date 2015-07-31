<?php 

class TopicComment extends Eloquent{
	
	protected $table = 'topic_comments';

	protected $fillable = array(
		'id',
		'content',
		'user_id',
		'topic_id',
		'created_at',
		'updated_at'
	);

}