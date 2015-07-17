<?php

class UserPageController extends BaseController{

	public function login()
	{
		Session_start();
		$builder = new CaptchaBuilder;
		$builder->build();
		$phrase = $builder->getPhrase();
		$_SESSION['phrase'] = $phrase;
		return View::make('login')->with('captcha', $builder);
	}

	public function getRemind()
	{
		return View::make('password/remind');
	}

	public function getReset()
	{
		return View::make('password/reset')->with('msgs', array());
	}

	//空间首页
	public function spaceHome($user_id)
	{
		$user = User::find($user_id);

		$realname 		= $user->realname;
		$city          		= $user->city;
		$gender     	     	= $user->gender;
		$per_description	= $user->per_description;

		//取得相册和话题数组
 		$albums 			= $user->hasManyAlbums()->get();
 		$topics 			= $user->hasManyTopics()->get();
 		if($albums != null)
 		{
 			foreach($albums as $album)
 			{
 				$pictures 			= $album->hasManyPictures()->get();
 				$album['pictureCount'] 	= $pictures->count();
 				$album['picture'] 		= $pictures[0]->picture;
 			}
 		}
 		if($topics != null)
 		{
 			foreach($topics as $topic)
 			{
 				$topic['topicCommentCount'] = $topic->hasManyTopicComments()->count();
 			}
 		}

		return View::make('空间首页')->with(array(
				'realname'     		=>$realname,
				'city'			=>$city,
				'gender'		=>$gender,
				'per_description' 	=> $per_description,
				'albums'  		=> $albums,
				'topics'   		=> $topics
			));
	}

	//话题动态
	public function topic($user_id)
	{

		$user = User::find($user_id);
		$topics = $user->hasManyTopics()->get();
		if($topics != null)
		{
			foreach($topics as $topic)
			{
				$topic["commentsCount"] = $topic->hasManyTopicComments()->count();
			}		
		}
		return View::make('话题动态')->with('topics',$topics);
	}

	//相册
	public function album($user_id)
	{

		$user = User::find($user_id);
		$albums = $user->hasManyAlbums()->get();

		if($albums != null)
		{
			foreach($albums as $album)
			{
				$album['albumCount'] 	= $album->hasManyPictures()->count();
				$album['picture'] 		= $album->hasManyPictures()->first()->picture;
			}	
		}
		return View::make('相册')->with('albums', $albums);
	}

	//照片
	public function picture($album_id)
	{
		 $album = Album::find($album_id);

		 $pictures = $album->hasManyPictures()->get();

		 return View::make('照片')->with('pictures',$pictures);
	}

	//个人中心——获取留言
	public function message($user_id)
	{
		$messages = Message::where('receiver_id', '=', $user_id)->get();
		foreach($messages as $message)
		{
			$message['username'] 			= User::find($message['sender_id'])->username;
			$message['messageCommentCount']	= $message->MessageComments()->count();
		}
		return View::make('留言页面')->with('messages', $messages);
	}

	//个人中心——获取回复
	public function messageComment($message_id)
	{

		$message_comments = MessageComment::where('message_id', '=', $message_id);
		foreach($message_comments as $message_comment)
		{
			$message_comment['avatar']	=	User::find($message_comment['user_id'])->avatar;
			$message_comment['username']   = 	User::find($message_comment['user_id'])->username;
		}
		return View::make('回复信息')->with('message_comments', $message_comments); 
	}

	//获取更新资料界面
	public function getUpdate($user_id)
	{
		$user = User::find($user_id);

		return View::make('个人资料')->with('user', $user);
	}

	
}