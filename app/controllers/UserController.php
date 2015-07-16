<?php

use Gregwar\Captcha\CaptchaBuilder;

class UserController extends BaseController
{

	public function postRegister()
	{

		Session_start();
		$data = array(
			'username'      => Input::get('username'),
			'email'             => Input::get('email'),
			'password'      => Input::get('password'),
			're_password' => Input::get('re_password')
		);

		$rules = array(
			'username'      =>'required|unique:users,username',
			'email'             =>'required|email|unique:users,email',
			'password'      =>'required|alpha_num|between:6,20',
			're_password' =>'required|same:password'
		);
		$messages = array(
			'username.required'      => 1,
			'email.required'             => 1,
			'password.required' 	    => 1,
			're_password.required' => 1,
			'username.unique'        => 2,
			'email.email'                 =>3,
			'email.unique'               =>4,
			'password.alpha_num'  =>5,
			'password.between'      =>6,
			're_password.same'     => 7
		);

		$validation = Validator::make($data, $rules,$messages);
		
		if ($validation->fails()) 
		{	//获得错误信息数组
			$number = $validation->messages()->all();
			switch ($number[0])
			{
			case 1:
				return Response::json(array('errCode'=>1, 'message'=>'信息填写不完整！')); 
				break;
			case 2:
				return Response::json(array('errCode'=>2, 'message'=>'用户名已被注册！'));
				break;
			case 3:
				return Response::json(array('errCode'=>3, 'message'=>'邮箱格式不正确！'));
				break;
			case 4:
				return Response::json(array('errCode'=>4, 'message'=>'邮箱已被注册！'));
				break;
			case 5:
				return Response::json(array('errCode'=>5, 'message'=>'密码只能包含字母和数字！'));
				break;
			case 6:
				return Response::json(array('errCode'=>6, 'message'=>'密码必须是6到20位之间！'));
				break;
			case 7:
				return Response::json(array('errCode'=>7, 'message'=>'两次密码输入不一致！'));
				break;
			default:
				return Response::json(array());

			}

			//return View::make('register')->with('msgs', $msgs);
		}else{
			//产生随机验证码发到邮箱
			$possible_charactors = "abcdefghijklmnopqrstuvwxyz0123456789";
			$salt  =  "";   //验证码
			while(strlen($salt) < 6)
			{
			 	 $salt .= substr($possible_charactors,rand(0,strlen($possible_charactors)-1),1);
			}
			
			//发送邮件
			Mail::send('emails/token',array('token' => $salt),function($message) use ($data)
			{
				$message->to($data['email'],'')->subject('中国儿童戏剧教育网验证码!');
			});

			//储存数据
			$_SESSION['registerSalt'] = $salt;
			$_SESSION['username'] =Input::get('username');
			$_SESSION['email'] =Input::get('email');
			$_SESSION['password'] =Input::get('password');

			return Response::json(array('errCode'=>0, 'message'=>'验证码发送成功!'));
		}
	}

	//校验码验证
	public function postCheckCode()
	{
		Session_start();
		$checkcode = trim(Input::get('checkcode'));
		$sessionSalt = $_SESSION['registerSalt'];

		$validation = Validator::make(
			array('checkcode' =>$checkcode),
			array('checkcode' =>'required|alpha_num|size:6')
		);

		if($validation->fails())
			return Response::json(array('errCode'=>1, 'message'=>'验证码格式不正确！'));

		if($checkcode != $sessionSalt)
			return Response::json(array('errCode'=>2, 'message'=>'验证码不正确！'));

		//创建用户
		User::create(array(
			'username' => $_SESSION['username'],
			'email' =>$_SESSION['email'],
			'password' => Hash::make($_SESSION['password'])
		));

		return Response::json(array('errCode'=>0, 'message'=>'注册成功！'));
	}


	public function login()
	{
		Session_start();
		$builder = new CaptchaBuilder;
		$builder->build();
		$phrase = $builder->getPhrase();
		$_SESSION['phrase'] = $phrase;
		return View::make('login')->with('captcha', $builder);
	}

	//生成验证码(congcong网)
	public function captcha()
	{	
		session_start();
		$builder = new CaptchaBuilder;
		$builder->build();
		$_SESSION['phrase'] = $builder->getPhrase();
		header("Cache-Control: no-cache, must-revalidate");
		header('Content-Type: image/jpeg');
		$builder->output();
		exit;
	}

	//验证码(congcong网)
	public function checkCaptcha()
	{
		Session_start();
		$captcha = Input::get('captcha');

		$validator = Validator::make(
			array('captcha'  => $captcha  ),
			array('captcha' => 'required|alpha_num|size :5' )
		);

		if($validator->fails()){
			return Response::json(array('errCode' => 2, "message" => "验证码格式错误", "validateMes" => $validator->messages()));
		}

		//$sessionCaptcha = Session::get('phrase');
		$sessionCaptcha = $_SESSION['phrase'];

		if($captcha != $sessionCaptcha)
			return Response::json(array('errCode' => 1,'message' => '验证码有误!'));

		return Response::json(array('errCode' => 0,'message' => '验证码正确!'));
	}

	//登录验证
	public function postLogin()
	{
		Session_start();
		$data = array(
			'username' => Input::get('username'),
			'password' => Input::get('password'),
			'captcha' => Input::get('captcha')
		);
		$rules = array(
			'username' =>'required|unique:users,username',
			'password' =>'required|alpha_num|between:6,20',
			'captcha'   =>'required|size: 5'  
		);
		$messages = array(
			'username.required' => 1,
			'password.required' => 2,
			'captcha.required' => 3,
			'username.unique' => 4,
			'password.alpha_num' =>5,
			'password.between' =>6,
			'captcha.size' =>7
		);

		$validation = Validator::make($data, $rules,$messages);

		//验证注册信息
		if ($validation->fails()) 
		{	//获得错误信息数组
			$number = $validation->messages()->all();
			switch ($number[0])
			{
			case 1:
				return Response::json(array('errCode'=>1, 'message'=>'请填写用户名！')); 
				break;
			case 2:
				return Response::json(array('errCode'=>2, 'message'=>'请填写密码！'));
				break;
			case 3:
				return Response::json(array('errCode'=>3, 'message'=>'请填写验证码！'));
				break;
			case 4:
				return Response::json(array('errCode'=>4, 'message'=>'用户名已被注册！'));
				break;
			case 5:
				return Response::json(array('errCode'=>5, 'message'=>'密码只能包含字母和数字！'));
				break;
			case 6:
				return Response::json(array('errCode'=>6, 'message'=>'密码必须是6到20位之间！'));
				break;
			case 7:
				return Response::json(array('errCode'=>7, 'message'=>'验证码格式错误！'));
				break;
			default:
				return Response::json(array());

			}
		}

		$sessionCaptcha = $_SESSION['phrase'];

		if($captcha != $sessionCaptcha)
		{
			return Response::json(array('errCode' => 8,'message' => '验证码有误!'));
		}
		
		return Response::json(array('errCode' => 0,'message' => '登录成功!'));
	}

	public function getRemind()
	{
		return View::make('password/remind');
	}

	//发用邮件重设密码
	public function postRemind()
	{
		session_start();
		$email = Input::get('email');

		$validation = Validator::make(
			array('email' => $email),
			array('email' => 'required|email')
		);

		if($validation->passes())
		{	
			$user = User::where('email', '=', $email)->count();

			if($user != 0)
			{
				Mail::send('emails/get_reset',array(),function($message) use ($email)
				{
					$message->to($email,'')->subject('中国儿童戏剧密码重置!');
				});

				$_SESSION['reset_email'] = $email;
				return Response::json(array('errCode' => 0,'message' => '验证码已发送!'));
			
			}else{
				return Response::json(array('errCode' => 1,'message' => '此邮箱还未注册！'));
			}

		}else{
			return Response::json(array('errCode' => 2,'message' => '邮箱格式错误！'));
		}
	}

	public function getReset()
	{
		return View::make('password/reset')->with('msgs', array());
	}

	//密码重置
	public function postReset()
	{
		session_start();
		$data = array(
			'password'    => Input::get('password'),
			're_password' => Input::get('re_password')
		);
		$rules = array(
			'password'      =>'required|alpha_num|between:6,20',
			're_password' =>'required|same:password'
		);
		$messages = array(
			'password.required' => '1',
			're_password.required' => '2',
			'password.between' => '3',
			'password.alpha_num' => '4',
			're_password.same' => '5'
		); 

		$validation = Validator::make($data, $rules,$messages);

		//验证注册信息
		if ($validation->fails()) 
		{	//获得错误信息数组
			$number = $validation->messages()->all();
			switch ($number[0])
			{
			case 1:
				return Response::json(array('errCode'=>1, 'message'=>'请填写重置密码！')); 
				break;
			case 2:
				return Response::json(array('errCode'=>2, 'message'=>'请填写重置密码！'));
				break;
			case 3:
				return Response::json(array('errCode'=>3, 'message'=>'密码必须是6到20位之间！'));
				break;
			case 4:
				return Response::json(array('errCode'=>4, 'message'=>'密码必须是数字或字母！'));
				break;
			case 5:
				return Response::json(array('errCode'=>5, 'message'=>'密码与第一次输入不一致'));
				break;
			default:
				return Response::json(array());
			}
		}

		//获取重置邮箱信息
		if(!isset($_SESSION['reset_email']))
		{
			return Response::json(array('errCode'=>6, 'message'=>'未发送重置信息！'));
		}

		//重置密码
		$email = $_SESSION['reset_email'];
		$reset_password =  DB::update('update users set password = ? where email = ?', 
						array(Hash::make($data['password']), $email));

		if(!isset($reset_password))
		{
			return Response::json(array('errCode'=>7, 'message'=>'密码重置失败！'));
		}
		//重置成功，返回主页！
		return Response::json(array('errCode'=>0, 'message'=>'密码重置成功！'));
	}

	//退出登录
	public function getLogout()
	{
		if(Sentry::check())
		{
			Sentry::logout();
			return Response::json(array('errCode'=>0, 'message'=>'退出成功！'));
		}else{
			return Response::json(array('errCode'=>1, 'message'=>'用户未登录！'));
		}
	}



	//在线报名
	public function postApplication()
	{
		if(!Sentry::check())
		{
			return Response::json(array('errCode'=>1, 'message'=>'请登录！'));
		}

		$name         = Input::get('name');
		$gender       = Input::get('gender');
		$year           = Input::get('year');
		$month         = Input::get('month');
		$day             = Input::get('day');
		$hometown   = Input::get('hometown');
		$address      = Input::get('address');
		$guardian     = Input::get('guardian');
		$phone         = Input::get('phone');
		$unit             = Input::get('unit');
		$position      = Input::get('position');
		$qq               = Input::get('QQ');
		$school         = Input::get('school');
		$postcode     = Input::get('postcode');
		$trainingunit   = Input::get('trainingunit');
		$profession   = Input::get('profession');
		$timeoflearn  = Input::get('timeoflearn');
		$details         = Input::get('details');

		$validation = Validator::make(
			array(
				'name' => $name,
				'phone' => $phone
			),
			array(
				'name'  => 'required',
				'phone' => 'required'			
			));
		if($validation->fails())
		{
			return Response::json(array('errCode'=>2, 'message'=>'名字和手机必须填写完整!'));
		}

		$reg = "/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$/";
		if(preg_match($reg, $phone))
		{
			return Response::json(array('errCode'=>3, 'message'=>'手机格式不正确！'));
		}
		//存储报名表
		$application = new Application;
		$application->name = $name;
		$application->gender = $gender;
		$application->year = $year;
		$application->month = $month;
		$application->day = $day;
		$application->hometown = $hometown;
		$application->address = $address;
		$application->guardian = $guardian;
		$application->phone = $phone;
		$application->unit = $unit;
		$application->position = $position;
		$application->qq = $qq;
		$application->school = $school;
		$application->postcode = $postcode;
		$application->trainingunit = $trainingunit;
		$application->profession = $profession;
		$application->timeoflearn = $timeoflearn;
		$application->details = $details;
		
		//产生考生编号
		$possible_charactors = "0123456789";
		$scorenumber  =  "";   //
		while(strlen($salt) < 6)
		{
		 	 $scorenumber .= substr($possible_charactors,rand(0,strlen($possible_charactors)-1),1);
		}
		$application->scorenumber = $scorenumber;

		if(!$application->save())
		{
			return Response::json(array('errCode'=>4, 'message'=>'资料保存失败！'));
		}

		return Response::json(array('errCode'=>0, 'message'=>$scorenumber));
	}

	//成绩查询
	public function scoreInquiry()
	{
		if(Sentry::check())
		{
			$user = Sentry::getUser();
		}else{
			return Response::json(array('errCode'=>1, 'message'=>'请登录！'));
		}

		$application = $user->hasOneApplication;

		if(!isset($application))
		{
			return Response::json(array('errCode'=>2,'message'=>'您还未报名！'));
		}

		$name = Input::get('name');
		$scorenumber = Input::get('scorenumber');
		$name_of_application =$application->name;
		$scorenumber_of_application = $application->scorenumber;

		$validation = Validator::make(
			array(
				'name'=>$name,
				'scorenumber' =>$scorenumber
			),
			array(
				'name' => 'required',
				'scorenumber' => 'required'
			));
		if($validation->fails())
		{
			return Response::json(array('errCode'=>3, 'message'=>'信息填写不完整！'));
		}

		if($name != $name_of_application)
		{
			return Response::json(array('errCode'=>4, 'message'=>'姓名填写错误！'));
		}

		if($scorenumber != $scorenumber_of_application)
		{
			return Response::json(array('errCode'=>5, 'message'=>'编号填写错误！'));
		}

		$score = $application->score;
		if(!isset($score))
		{
			return Response::json(array('errCode'=>6,'message'=>'成绩还未出来！'));
		}

		return Response::json(array('errCode'=>0, 'application'=>$application));
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

	//个人中心——发表留言
	public function postMessage()
	{
		if(!Sentry::check())
		{
			return Response::json(array('errCode'=>1, 'message'=>'请登录！'));
		}

		$receiver_id = Input::get('receiver_id');

		$sender_id = Sentry::getUser()->id;
		
		$content = Input::get('message_content');

		$msg = new Message;
		$msg->receiver_id = $receiver_id;
		$msg->sender_id = $sender_id;
		$msg->content = $content;

		if(!$msg->save())
		{
			return Response::json(array('errCode'=>2, 'message'=>'回复失败！'));
		}
		$msg['avatar'] 		= User::find($sender_id)->avatar;
		$msg['username']	 	= User::find($sender_id)->username;

		return Response::json(array('errCode'=>0, 'msg'=>$msg));
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

	//个人中心——发表回复
	public function postMessageComment()
	{
		if(!Sentry::check())
		{
			return Response::json(array('errCode'=>1, 'message'=>'请登录！'));
		}
		$user = Sentry::getUser();

		$message_id = Input::get('message_id');
		$content 	= Input::get('comment_content');

		$comment = new MessageComment;
		$comment->message_id = $message_id;
		$comment->content = $content;
		$comment->user_id = $user->id;

		if(!$comment->save())
		{
			return Response::json(array('errCode'=>2, 'message'=>'评论创建失败！'));
		}

		$comment['username'] 	= $user->username;
		$comment['avatar']		= $user->avatar;

		return Response::json(array('errCode'=>0, 'comment'=>$comment)); 
	}

		//获取更新资料界面
	public function getUpdate($user_id)
	{
		$user = User::find($user_id);

		return View::make('个人资料')->with('user', $user);
	}

	//更新资料,根据cngcong网写
	public function postUpdate()
	{
		if(!Sentry::check())
		{
			return Response::json(array('errCode'=>1, 'message'=>'请登录！'));
		}		
		$data =array(
			'realname' 		=> Input::get('realname'),
			'gender' 		=> Input::get('gender'), //boolean
			'city' 			=> Input::get('city'),
			'position' 		=> Input::get('position'),
			'interests' 		=> Input::get('interests'),
			'per_description'	=> Input::get('per_description')
		);

		$rules = array(
			'realname' 		=> 'max:20',
			'gender' 		=> 'boolean', //boolean
			'city' 			=>  'max:20',
			'position' 		=>  'max:20',
			'interests' 		=>  'max:50',
			'per_description' 	=> 'size:1000'
		);

		$messages = array(
			'realname' 		=> '1',
			'gender' 		=> '2', //boolean，做成候选模式
			'city' 			=> '3',
			'position' 		=> '4',
			'interests' 		=> '5',
			'per_description' 	=> '6'
		);

		$validation = Validator::make($data, $rules, $messages);

		if ($validation->fails()) 
		{	//获得错误信息数组
			$number = $validation->messages()->all();
			switch ($number[0])
			{
			case 1:
				return Response::json(array('errCode'=>2, 'message'=>'名字长度不能超过20个字！'));
				break;
			case 2:
				return Response::json(array('errCode'=>3, 'message'=>''));
				break;
			case 3:
				return Response::json(array('errCode'=>4, 'message'=>'城市名字不能超过20个字！'));
				break;
			case 4:
				return Response::json(array('errCode'=>5, 'message'=>'职位名字不能超过20个字！'));
				break;
			case 5:
				return Response::json(array('errCode'=>6, 'message'=>'兴趣描述不可超过50个字！'));
				break;
			default:
				return Response::json(array('errCode'=>7, 'message'=>'个人简介不可超过1000个字！'));
			}
		}
		
		//性别分开写
		if($data['gender'] != 1 && $data['gender'] != 0)
			$data['gender'] = 2;

		$user = Sentry::getUser();
		$user->realname 		= $data['realname'];
		$user->gender 		= $data['gender'];
		$user->position 		= $data['position'];
		$user->city 			= $data['city'];
		$user->interests 		= $data['interests'];
		$user->per_description 	= $data['per_description'];

		if($user->save())
			return Response::json(array('errCode'=>0, '修改成功!'));

		return Response::json(array('errCode'=>8, '修改失败！'));
	}

	//更换图片
	public function changeImage()
	{
		if(!Sentry::check())
		{
			return Response::json(array('errCode'=>1, 'message'=>'请登录！'));
		}

		$avatar = Input::get('avatar');
		$messages = array(
			'avatar.required' => '1',
			'avatar.image' =>'2',
			'avatar.size' =>'3'
		);
		$validation = validator::make(
			array(
				'avatar'=>$avatar
			),
			array(
				'avatar' =>'required|image|size:500'
			),
			$messages
			);
		if($validation->fails())
		{	
			//获得错误信息数组
			$number = $validation->messages()->all();
			switch ($number[0])
			{
			case 1:
				return Response::json(array('errCode'=>1, 'message'=>'无图片上传！')); 
				break;
			case 2:
				return Response::json(array('errCode'=>2, 'message'=>'图片格式不正确！'));
				break;
			default:
				return Response::json(array('errCode'=>3, 'message'=>'图片必须小于500kb！'));
			}
		}
		return Response::json(array('errCode'=>0, 'message' => '头像上传成功！'));
	}

	public function test()
	{
		// return new Umeditor;
	}
}