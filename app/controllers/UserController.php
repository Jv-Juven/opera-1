<?php

use Gregwar\Captcha\CaptchaBuilder;

class UserController extends BaseController{

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

	// //校验码验证
	// public function postCheckCode()
	// {
	// 	Session_start();
	// 	$checkcode = trim(Input::get('checkcode'));
	// 	$sessionSalt = $_SESSION['registerSalt'];

	// 	$validation = Validator::make(
	// 		array('checkcode' =>$checkcode),
	// 		array('checkcode' =>'required|alpha_num|size:6')
	// 	);

	// 	if($validation->fails())
	// 		return Response::json(array('errCode'=>1, 'message'=>'验证码格式不正确！'));

	// 	if($checkcode != $sessionSalt)
	// 		return Response::json(array('errCode'=>2, 'message'=>'验证码不正确！'));

	// 	//创建用户
	// 	User::create(array(
	// 		'username' => $_SESSION['username'],
	// 		'email' =>$_SESSION['email'],
	// 		'password' => $_SESSION['password'],
	// 		'role_id' =>1
	// 	));

	// 	return Response::json(array('errCode'=>0, 'message'=>'注册成功！'));
	// }

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
			array('captcha' => 'required|alpha_num|size :6' )
		);

		if($validator->fails()){
			return Response::json(array('errCode' => 1, "message" => "验证码格式错误", "validateMes" => $validator->messages()));
		}
		//$sessionCaptcha = Session::get('phrase');
		$sessionCaptcha = $_SESSION['registerSalt'];

		if($captcha != $sessionCaptcha)
			return Response::json(array('errCode' => 2,'message' => '验证码有误!'));

		//创建用户
		User::create(array(
			'username' => $_SESSION['username'],
			'email' =>$_SESSION['email'],
			'password' =>Hash::make($_SESSION['password']),
			'role_id' =>1

		));

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
			'username' =>'required',
			'password' =>'required|alpha_num|between:6,20',
			'captcha'   =>'required|size: 5'  
		);
		$messages = array(
			'username.required' => 1,
			'password.required' => 2,
			'captcha.required' => 3,
			'password.alpha_num' =>4,
			'password.between' =>5,
			'captcha.size' =>6
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
			case 5:
				return Response::json(array('errCode'=>4, 'message'=>'密码只能包含字母和数字！'));
				break;
			case 6:
				return Response::json(array('errCode'=>5, 'message'=>'密码必须是6到20位之间！'));
				break;
			case 7:
				return Response::json(array('errCode'=>6, 'message'=>'验证码格式错误！'));
				break;
			default:
				return Response::json(array());

			}
		}

		$sessionCaptcha = $_SESSION['phrase'];

		if($data['captcha'] != $sessionCaptcha)
		{
			return Response::json(array('errCode' => 7,'message' => '验证码有误!'));
		}
		
		$user = User::where('username', '=', $data['username'])->first();

	    if(!isset($user))
	    {
	    	return Response::json(array('errCode' => 8,'message' => '此用户没注册!'));
	    }
		// $password = $user->password;
		// $data = Hash::make($data['password']);
		// dd(Hash::make(666666));
		// if( $data != $password )
		// {
		// 	return Response::json(array('errCode' => 9,'message' => '密码错误!'));
		// }
		// return Response::json(array('errCode' => 0,'message' => '登录成功!'));

		if(Auth::attempt(array('username'=>$data['username'], 'password'=> $data['password'])))
		{	
			$user = Auth::user();
			$user_id = $user->id;
			$_SESSION['user'] = $user_id;
 			return Response::json(array('errCode' => 0,'message' => '登录成功!','user'=>$user,'session_id'=>$_SESSION['user']));
		}

		return Response::json(array('errCode' => 9,'message' => '密码错误!'));
	}

	//重发验证码
	public function resendCheckCode(){
		 Session_start();
		 $email =  Input::get('email');
		 //产生随机验证码发到邮箱
		$possible_charactors = "abcdefghijklmnopqrstuvwxyz0123456789";
		$salt  =  "";   //验证码
		while(strlen($salt) < 6)
		{
		 	 $salt .= substr($possible_charactors,rand(0,strlen($possible_charactors)-1),1);
		}
		
		//发送邮件
		Mail::send('emails/token',array('token' => $salt),function($message) use ($email)
		{
			$message->to($email,'')->subject('中国儿童戏剧教育网验证码!');
		});

		$_SESSION['registerSalt'] = $salt;

		return Response::json(array('errCode' => 0, 'message'=> '验证码发送成功！'));
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
				Mail::send('login/findPassword',array(),function($message) use ($email)
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
		if(Auth::check())
		{
			Auth::logout();
			return Response::json(array('errCode'=>0, 'message'=>'退出成功！'));
		}else{
			return Response::json(array('errCode'=>1, 'message'=>'用户未登录！'));
		}
	}



	//在线报名
	public function postApplication()
	{
		if(!Auth::check())
		{
			return Response::json(array('errCode'=>1, 'message'=>'请登录！'));
		}
		
		$user_id 	= Auth::user()->id;
		$name        	= Input::get('name');
		$gender       	= Input::get('gender');
		if($gender == null)
		{
			$gender = 2;
		}
		$year           	= Input::get('year');
		$month         	= Input::get('month');
		$day             	= Input::get('day');
		$hometown   	= Input::get('hometown');
		$address      	= Input::get('address');
		$guardian     	= Input::get('guardian');
		$phone         	= Input::get('phone');
		$unit             	= Input::get('unit');
		$position      	= Input::get('position');
		$qq               	= Input::get('QQ');
		$school        	= Input::get('school');
		$postcode     	= Input::get('postcode');
		$trainingunit   	= Input::get('trainingunit');
		$profession   	= Input::get('profession');
		$timeoflearn  	= Input::get('timeoflearn');
		$details         	= Input::get('details');
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

		$reg = "/^0?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/";
		if( !preg_match($reg, $phone))
		{
			return Response::json(array('errCode'=>3, 'message'=>'手机格式不正确！'));
		}
		//存储报名表
		$application 			= new Application;
		$application->user_id 		= $user_id;
		$application->name 		= $name;
		$application->gender 		= $gender;
		$application->year 		= $year;
		$application->month 		= $month;
		$application->day 		= $day;
		$application->hometown 	= $hometown;
		$application->address 	= $address;
		$application->guardian 	= $guardian;
		$application->phone 		= $phone;
		$application->unit 		= $unit;
		$application->position 		= $position;
		$application->qq 		= $qq;
		$application->school 		= $school;
		$application->postcode 	= $postcode;
		$application->trainingunit 	= $trainingunit;
		$application->profession 	= $profession;
		$application->timeoflearn 	= $timeoflearn;
		$application->details 		= $details;
		
		//产生考生编号
		$possible_charactors = "0123456789";
		$scorenumber  =  "";   //
		while(strlen($scorenumber) < 6)
		{
		 	 $scorenumber .= substr($possible_charactors,rand(0,strlen($possible_charactors)-1),1);
		}
		$application->scorenumber = $scorenumber;

		if($application->save())
		{
			return Response::json(array('errCode'=>0, 'message'=>$scorenumber));
		}
		return Response::json(array('errCode'=>4, 'message'=>'资料保存失败！'));
	}

	//成绩查询
	public function scoreInquiry()
	{
		if(Auth::check())
		{
			$user = Auth::getUser();
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

	//个人中心——发表留言
	public function postMessage()
	{
		if(!Auth::check())
		{
			return Response::json(array('errCode'=>1, 'message'=>'请登录！'));
		}

		$receiver_id = Input::get('receiver_id');

		$sender_id = Auth::user()->id;
		
		$content = Input::get('content');

		$validation = Validator::make(
			array('content'=>$content),
			array('content'=>'required' )
			);
		if($validation->fails())
		{
			return Response::json(array('errCode'=>2,' message' =>'请填写评论内容！'));
		}
		$msg = new Message;
		$msg->receiver_id = $receiver_id;
		$msg->sender_id = $sender_id;
		$msg->content = $content;

		if(!$msg->save())
		{
			return Response::json(array('errCode'=>3, 'message'=>'留言失败！'));
		}

		$msg["avatar"] = Auth::user()->avatar;
		$msg["sender_name"] = Auth::user()->username;


		return Response::json(array('errCode'=>0, 'message'=>$msg));
	}

	//个人中心——删除留言
	public function deleteMessage()
	{
		if(!Auth::check())
		{
			return Response::json(array('errCode'=>1, 'message'=>'请登录！'));
		}

		$message_id = Input::get('message_id');
		$user_id = Auth::user()->id;

		$message = Message::find($message_id);

		if($message->receiver_id == $user_id)
		{
			if(!$message->delete())
			{
				return Response::json(array('errCode'=>2, 'message'=>'[数据库错误]删除留言失败'));
			}
		}
		else
		{
			return Response::json(array('errCode'=>1, 'message'=>'[权限禁止]只能删除自己收到的留言'));
		}

		return Response::json(array('errCode'=>0));
	}

	//个人中心——发表回复
	public function postMessageComment()
	{
		if(!Auth::check())
		{
			return Response::json(array('errCode'=>1, 'message'=>'请登录！'));
		}
		$user = Auth::getUser();

		$message_id = Input::get('message_id');		// 留言的id
		$comment_id = Input::get('comment_id');		// 留言下评论的id，当comment_type为1时可用
		$comment_type = Input::get('comment_type');	// comment_type参数有两种取值，0代表是直接在留言下回复，1代表是在留言的评论下回复
		$content 	= Input::get('content');

		$comment = new MessageComment();
		$comment->message_id = $message_id;
		$comment->content = $content;
		$comment->sender_id = $user->id;

		if($comment_type == 1)
		{
			$comment->receiver_id = MessageComment::find($comment_id)->sender_id;
		}
		else
		{
			$comment->receiver_id = Message::find($message_id)->sender_id;
		}

		if(!$comment->save())
		{
			return Response::json(array('errCode'=>2, 'message'=>'评论创建失败！'));
		}
		
		$comment['sender_name'] = $user->username;
		$comment['avatar']		= $user->avatar;
		$comment['receiver_name'] = User::find($comment->receiver_id)->username;

		return Response::json(array('errCode'=>0, 'comment'=>$comment)); 
	}

	//更新资料,根据cngcong网写
	public function postUpdate()
	{
		if(!Auth::check())
		{
			return Response::json(array('errCode'=>1, 'message'=>'请登录！'));
		}
		
		$user_id = Auth::user()->id;
		$another_id = Input::get('user_id');

		if($user_id != $another_id)
		{
			return Response::json(array('crrCode' =>2,'message'=>'不可以更改其他人资料'));
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
			'per_description' 	=> 'max:1000'
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
				return Response::json(array('errCode'=>3, 'message'=>'名字长度不能超过20个字！'));
				break;
			case 2:
				return Response::json(array('errCode'=>4, 'message'=>''));
				break;
			case 3:
				return Response::json(array('errCode'=>5, 'message'=>'城市名字不能超过20个字！'));
				break;
			case 4:
				return Response::json(array('errCode'=>6, 'message'=>'职位名字不能超过20个字！'));
				break;
			case 5:
				return Response::json(array('errCode'=>7, 'message'=>'兴趣描述不可超过50个字！'));
				break;
			default:
				return Response::json(array('errCode'=>8, 'message'=>'个人简介不可超过1000个字！'));
			}
		}
		
		//性别分开写
		if($data['gender'] != 1 && $data['gender'] != 0)
			$data['gender'] = 2;

		$user = Auth::getUser();
		$user->realname 		= $data['realname'];
		$user->gender 		= $data['gender'];
		$user->position 		= $data['position'];
		$user->city 			= $data['city'];
		$user->interests 		= $data['interests'];
		$user->per_description 	= $data['per_description'];

		if($user->save())
			return Response::json(array('errCode'=>0, '修改成功!'));

		return Response::json(array('errCode'=>9, '修改失败！'));
	}

	//更换图片
	public function changeImage()
	{
		if(!Auth::check())
		{
			return Response::json(array('errCode'=>1, 'message'=>'请登录！'));
		}

		$avatar = Input::get('avatar');
		$messages = array(
			'avatar.required' => 1,
		);
		$validation = Validator::make(
			array(
				'avatar'=>$avatar
			),
			array(
				'avatar' =>'required'
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
				return Response::json(array('errCode'=>2, 'message'=>'无图片上传！')); 
				break;
			default:
				return Response::json(array('errCode'=>3, 'message'=>'图片必须小于500kb！'));
			}
		}
		$user = Auth::user();
		$user->avatar = $avatar;
		if($user->save())
		{
			return Response::json(array('errCode'=>0, 'message' => '头像上传成功！'));
		}

		return Response::json(array('errCode'=>4, 'message' =>'图片上传失败！'));
	}

	//发表话题
	public function issueTopic()
	{
		$title = Input::get('title');
		$content = Input::get('content');
		$user_id = Auth::user()->id;
		$validation = Validator::make(
				array(
				'title' =>$title,
				'content' => $content
				),
				array(
				'title' => 'required',
				'content' => 'required'
				)
		);

		if ($validation->fails()) 
		{
			return Response::json(array('errCode'=>1, 'message'=> '信息填写不完整！'));
		}
		//创建用户
		$topic = new Topic;
		$topic->user_id 	= $user_id;
		$topic->title 		= $title;
		$topic->content 	= $content;
		if($topic->save())
		{
			return Response::json(array('errCode'=>0,'message'=>'话题发表成功!'));
		}

		return Response::json(array('errCode'=>2, 'message'=>'话题发表失败，请重新发送！'));
	}

	//话题评论
	public function topicComment()
	{
		if(!Auth::check())
		{
			return Response::json(array('errCode'=>1, 'message'=>'[权限禁止]请先登录'));
		}

		$user = Auth::user();
		$content = Input::get('content');
		$topic_id = Input::get('topic_id');

		$validation = Validator::make(
			array('content' => $content),
			array('content' => 'required')
		);

		if($validation->fails())
		{
			return Response::json(array('errCode'=>1, 'message'=>'请填写评论内容！'));
		}

		$topic_comment = new TopicComment;
		$topic_comment->content = $content;
		$topic_comment->topic_id = $topic_id;
		$topic_comment->user_id = $user->id;
		if(!$topic_comment->save())
		{
			return Response::json(array('errrCode'=>'2', 'message'=>'[数据库错误]评论保存失败！'));
		}

		$topic_comment["author_name"] = $user->username;
		$topic_comment["avatar"] = $user->avatar;

		return Response::json(array('errCode'=>0, 'comment'=>$topic_comment));

	}

	//话题评论的回复
	public function reply()
	{
		if(!Auth::check())
		{
			return Response::json(array('errCode'=>1, 'message'=>'[权限禁止]请先登录'));
		}

		$user = Auth::user();
		$content = Input::get('content');
		$topic_id = Input::get('topic_id');
		$comment_id = Input::get('comment_id');
		$reply_id = Input::get('reply_id');
		$reply_type = Input::get('reply_type');

		$validation = Validator::make(
			array('content' => $content),
			array('content' => 'required')
			);

		if($validation->fails())
		{
			return Response::json(array('errCode'=>1, 'message'=>'请填写回复内容！'));
		}

		$reply = new CommentOfTopiccomment;
		$reply->content = $content;
		$reply->topiccomment_id = $comment_id;
		$reply->topic_id = $topic_id;
		$reply->sender_id = $user->id;
		if($reply_type == 0)
		{
			$reply->receiver_id = TopicComment::find($comment_id)->user_id;
		}
		else
		{
			$reply->receiver_id = CommentOfTopiccomment::find($reply_id)->sender_id;
		}

		if(!$reply->save())
		{
			return Response::json(array('errrCode'=>2, 'message'=>'[数据库错误]回复评论失败！'));
		}

		$reply["sender_avatar"] = $user->avatar;
		$reply["sender_name"] = $user->username;
		$reply["receiver_name"] = User::find($reply->receiver_id)->username;

		return Response::json(array('errCode'=>0, 'reply'=>$reply));
	}
	
	public function isOwn()
	{
		if(!Auth::check())
		{
			return Response::json(array('errCode'=>1, 'message'=>'无效操作'));
		}
		$user_id = Auth::user()->id;
		$another_id = Input::get('user_id');
		if($user_id != $another_id)
		{
			return Response::json(array('errCode'=>2, 'message'=>'无效操作'));
		}

		return Response::json(array('errCode'=>0, 'message'=>'可操作'));
	}

	

}