<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use RemindableTrait;
	
	protected $table = 'users';

	protected $hidden = array('password');

	protected $fillable = array(
		'id',
		'username',
		'email',
		'avatar',
		'realname',
		'gender',
		'city',
		'identity',
		'position',
		'interests',
		'per_description',
		'scorenember',
		'score',
		'created_at',
		'updated_at'
	);

	//自己有很多评论
	public function hasManyComments()
	{
		return $this->hasMany('Comment', 'user_id', 'id');
	}

	//自己有很多话题
	public function hasManyTopics()
	{
		return $this->hasMany('Topic','user_id', 'id');
	}

	//与话题相关的评论
	public function hasManyTopicComments()
	{
		//通过话题取得评论，与话题关联的是user_id字段，与评论关联的是topic_id字段
		return $this->hasManyThrough('Comment', 'Topic', 'user_id', 'topic_id');
	}
	
	//相册
	public function hasManyAlbums()
	{
		return $this->hasMany('Album','user_id', 'id');
	}
	

	//留言
	public function hasManyMessages()
	{
		return $this->hasMany('Message','sender_id', 'id');
	}

	//发表的回复
	public function hasManyMessageComments()
	{
		return $this->hasMany('MessageComment','sender_id', 'id');
	}

	public function hasOneApplication()
	{
		return $this->hasOne('Application', 'user_id', 'id');
	}

	public function getAuthIdentifier(){ return $this->getKey();}

	public function getAuthPassword(){return $this->password;}

	public function getRememberToken(){return $this->remember_token;}

	public function setRememberToken($value){$this->remember_token = $value;}

	public function getRememberTokenName(){return 'remember_token';}

	public function getReminderEmail(){return $this->email;}

}
