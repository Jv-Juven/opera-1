<?php 

class Topic extends Eloquent{

	protected $table = 'topics';

	protected $fillable = array(
		'id',
		'user_id',
		'title',
		'topic',
		'created_at'
	);

	public function UserOfTopic()
	{
		return $this->belongsTo('User');
	}

	public function hasManyTopicComments()
	{
		return $this->hasMany('TopicComment', 'topic_id', 'id');
	}

}