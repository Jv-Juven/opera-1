<?php

class AdminAuthenticationController extends BaseController{

	public function addAuthentication()
	{
		$avatar 	= Input::get('avatar');
		$username 	= Input::get('username');
		$email 	= Input::get('email');
		$password 	= Input::get('password');

		$data = array(
			'avatar' 	=> $avatar,
			'username' 	=> $username,
			'email' 		=> $email,
			'password' 	=> $password
			);
		$rules = array(
			'avatar' 	=> 'required|image',
			'username'	=> 'required|unique:users,username',
			'email'		=> 'required|email|unique:users,email',
			'password'	=> 'required|alpha_num|between:6,20'
			);
		$messages = array(
			'required' 			=> 1,
			'avatar.image' 		=> 2,
			'username.unique' 		=> 3,
			'email.email' 			=> 4,
			'email.unique' 		=> 5,
			'password.alpha_num' 	=> 6,
			'password.between' 		=> 7
			);

		$validation = Validator::make($data, $rules, $messages);

		if($validation->fails())
		{
			$number = $validation->messages()->all();
			switch ($number[0]) 
			{
				case 1:
				return Response::json(array('errCode'=>1, 'message'=>'信息填写不完整！')); 
				break;
			case 2:
				return Response::json(array('errCode'=>2, 'message'=>'必须为jpeg, png, bmp 或 gif的图片格式！'));
				break;
			case 3:
				return Response::json(array('errCode'=>3, 'message'=>'此用户名已注册！'));
				break;
			case 4:
				return Response::json(array('errCode'=>4, 'message'=>'邮箱格式不正确！'));
				break;
			case 5:
				return Response::json(array('errCode'=>5, 'message'=>'此邮箱已被注册！'));
				break;
			case 6:
				return Response::json(array('errCode'=>6, 'message'=>'密码必须由字母或数字组成！'));
				break;
			default:
				return Response::json(array('errCode'=>7, 'message'=>'密码必须是6到20位之间！'));
			}
		}

		$user = new User;
		$role_id = 2;
		$user->username 	= $username;
		$user->email 		= $email;
		$user->password 	= $password;
		$user->avatar 	= $avatar;
		$user->role_id 	= $role_id;

		if(!$user->save())
		{
			return Response::json(array('errCode'=>8, 'message'=>'添加失败！'));
		}

		return Response::json(array('errCode'=>0,  'message'=>'添加成功！'));
	}
}