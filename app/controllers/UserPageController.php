<?php

use Gregwar\Captcha\CaptchaBuilder;
class UserPageController extends BaseController {

	public function login()
	{
		Session_start();
		$builder = new CaptchaBuilder;
		$builder->build();
		$phrase = $builder->getPhrase();
		$_SESSION['phrase'] = $phrase;

		return View::make('login')->with(array(
			'captcha' 	=> $builder,
			'links' 	=> $this->link()
		));
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
	public function spaceHome()
	{	
		$user_id = Input::get('user_id');
		
		if($user_id != null)
		{
			$user = User::find($user_id);
		}else{
			if(!Auth::check())
			{
				return Redirect::back();
			}
			$user = Auth::user();
		}
		// dd($user_id);	
		$albums 		= $user->hasManyAlbums()->get();
 		$topics			= $user->hasManyTopics()->get();
 		// dd($albums);
 
 		$pictureCount = array();
 		$picture  = array();
 		$topicCommentCount = array();
 		if($albums != null)
 		{	
 			foreach($albums as $album)
 			{	
 				$pictures 			= $album->hasManyPictures()->get();
 				$pictureCount[$album['id']] 	= $pictures->count();
 				$p 				= $pictures->toArray();
 				if($p != null )
 				{
 					$picture[$album['id']]	 = $p[0]['picture'];
 				}
 				else 
 				{
 					$picture[$album['id']]	 = "http://7xk6xh.com1.z0.glb.clouddn.com/album_03.png";
 				}
 			}
 		}

 		if($topics != null)
 		{
 			foreach($topics as $topic)
 			{
 				$topicCommentCount[$topic['id']] = $topic->hasManyTopicComments()->count();
 			}
 		}

 		$albums 			= Album::where('user_id', '=', $user_id)->paginate(2);
 		$topics 			= Topic::where('user_id', '=', $user_id)->paginate(2);
			
		$result = array(
			'user' 	  		  		=> $user,
			'albums'  		  		=> $albums,
			'topics'   		  		=> $topics,
			'pictureCount' 	  		=>$pictureCount,
			'picture'		 	 	=>$picture,
			'topicCommentCount'    	=> $topicCommentCount,
			'links' 			  	=>$this->link()
		);

		return View::make('userCenter.zone')->with($result);
	}

	//话题动态
	public function topic()
	{
		$user_id = Input::get('user_id');
		$user = User::find($user_id);
		$topics = $user->hasManyTopics()->get();
		//将话题的评论和回复储存到对应的数组中，遍历时记得是字符串
		$comments_replys = array();
		if(count($topics) != 0)
		{
			foreach($topics as &$topic)
			{
				$topic["commentsCount"] = $topic->hasManyTopicComments()->count();
				$topic["comments"] = $topic->hasManyTopicComments()->get();
				foreach ($topic["comments"] as &$comment) {
					$replies = DB::table("comment_of_topiccomments")->where('topiccomment_id', '=', $comment->id)->orderBy("created_at")->get();
					$comment["author_name"] = User::find($comment->user_id)->username;
					$comment["author_avatar"] = User::find($comment->user_id)->avatar;

					foreach ($replies as &$reply) {
						$reply->receiver_avatar = User::find($reply->receiver_id)->avatar;
						$reply->receiver_name = User::find($reply->receiver_id)->username;
						$reply->sender_avatar = User::find($reply->sender_id)->avatar;
						$reply->sender_name = User::find($reply->sender_id)->username;
					}

					$comment["replies"] = $replies;
				}
			}		
		}


		return View::make('userCenter.dynamic')->with(array(
					'topics' => $topics,
					'user'   => $user,
					'links' 	=>$this->link()
					));
	}

	//相册
	public function album()
	{
		$user_id = Input::get('user_id');
		$user = User::find($user_id);
		$albums = $user->hasManyAlbums()->get();

		if($albums != null)
		{
			foreach($albums as $album)
			{
				$album->albumCount 	= $album->hasManyPictures()->count();
				$pictures 		= $album->hasManyPictures()->get();
				$pictures 		= $pictures->toArray();
				if($pictures == null)
				{
					$album->picture 	= "http://7xk6xh.com1.z0.glb.clouddn.com/album_03.png";
				}else{

					$album->picture	= $pictures[0]['picture'];
				}
				$album->save();
			}	
		}
		$albums = Album::where('user_id','=', $user_id)->paginate(6);

		return View::make('userCenter.photo-album')->with(array(
			'albums' 	=> $albums,
			'user' 		=> $user,
			'links' 		=>$this->link()
			));
	}

	//照片
	public function picture()
	{	
		$album_id	= Input::get('album_id');
		$album 	= Album::find($album_id);
		if($album == null)
		{
			return Response::json(array('errCode' =>1, 'message'=>'此相册不存在！','pictures'=>''));
		}
		 $pictures 	= $album->hasManyPictures()->get();
		 if(count($pictures) !=0)
		 {
			 return Response::json(array('errCode'=>0, 'message'=>'返回相片','pictures'=>$pictures)) ;
		 }

		 return Response::json(array('errCode' =>1, 'message'=>'该相册没有图片','pictures'=>''));
	}

	//个人中心——获取留言
	public function message()
	{	
		$user_id = Input::get('user_id');
		$user = User::find($user_id);
		$messages = Message::where('receiver_id', '=', $user_id)->orderBy("created_at")->get();
		foreach($messages as $message)
		{
			$message['sender'] 				= User::find($message['sender_id'])->username;
			$message['avatar']				= User::find($message['sender_id'])->avatar;
			$message['messageCommentCount']	= $message->MessageComments()->count();
			$message['comments']			= MessageComment::where("message_id", "=", $message->id)->orderBy("created_at")->get();
			
			foreach ($message["comments"] as &$comment) {
				$comment["sender_name"] = User::find($comment["sender_id"])->username;
				$comment["receiver_name"] = User::find($comment["receiver_id"])->username;
				$comment["sender_avatar"] = User::find($comment["sender_id"])->avatar;
			}
		}
		return View::make('userCenter.message')->with(array(
			'messages' 	=> $messages,
			'user' 	 	=> $user,
			'links' 	=> $this->link()
		));
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
		return View::make('回复信息')->with(array(
			'message_comments' => $message_comments,
			'links' 			=>$this->link()
			)); 
	}

	//获取更新资料界面
	public function getUpdate()
	{
		$user_id = Input::get('user_id');

		$user = User::find($user_id);

		return View::make('userCenter.information')->with(array(
				'user'		=>$user,
				'links' 		=>$this->link()
			));
	}

	//论谈评论
	
	
	//论谈回复
	
}