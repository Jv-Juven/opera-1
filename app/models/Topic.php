<?php 

class Topic extends Eloquent{

	protected $table = 'topics';

	protected $fillable = array(
		'id',
		'user_id',
		'title',
		'content',
		'created_at'
	);

	public function hasManyTopicComments()
	{
		return $this->hasMany('TopicComment', 'topic_id', 'id');
	}

}