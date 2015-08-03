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
		'reset_id',
		'email',
		'password',
		'avatar',
		'realname',
		'gender',
		'city',
		'identity',
		'position',
		'interests',
		'per_description',
		'role_id',
		'created_at',
		'updated_at'
	);

	//自己有很多话题
	public function hasManyTopics()
	{
		return $this->hasMany('Topic','user_id', 'id');
	}


	//自己有很多评论
	public function hasManyTopicComments()
	{
		return $this->hasMany('TopicComment', 'user_id', 'id');
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
		return $this->hasMany('MessageComment','user_id', 'id');
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
