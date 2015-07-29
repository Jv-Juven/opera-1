<?php

class AuthenticationPageController extends BaseController{

	public function getSortOfIdentity($identity = null)
	{
		//取得用户对象数组
		$users = User::where('role_id', '=', 0)->get();
		//主席团
		$bureaus = array();
		//顾问
		$consultants = array();
		//理事
		$directors = array();
		//舞协会员
		$dance_associations = array();
		//网站会员 
		$website_members = array();

		foreach($users as $user)
		{	
			//将不同身份的人分组
			//identity:1=>主题团，2=>顾问，3=>理事，4=>舞协会员，5=>网站会员
			switch ($user->identity) 
			{
				case 1:
					array_push($bureaus, $user);
					break;
				case 2:
					array_push($consultants, $user);
					break;
				case 3:
					array_push($directors, $user);
					break;
				case 4:
					array_push($dance_associations, $user);
					break;
				default:
					array_push($website_members, $user);
			}
		}
		switch ($identity) {
			case 1:
				return View::make('certification.identity')->with('bureaus', $bureaus);
				break;
			case 2:
				return View::make('certification.identity')->with('consultants', $consultants);
				break;
			case 3:
				return View::make('certification.identity')->with('directors', $directors);
				break;
			case 4:
				return View::make('certification.identity')->with('dance_associattions', $dance_associattions);
				break;
			case 5:
				return View::make('certification.identity')->with('website_members', $website_members);
				break;
			default:
				return View::make('certification.identity')->with(array(
					'bureaus' => $bureaus, 
					'consultants' => $consultants,
					'directors' => $directors,
					'dance_associattions' =>$dance_associations,
					'website_members' => $website_members,
				));
		}
	}

	//按所在身份分类
	public function getSortOfCity($area = null)
	{
		$users = User::all();
		//以城市名称为键的数组
		$cities = array();
		foreach($users as $user)
		{
			$city = $user->city;
			//将城市的名称变成变量名
			if(!isset($$city))
			{
				$$city = array();
			}
			array_push($$city, $user);
			if(!isset($cities[$city]))
			{
				$cities[$city] = $$city;
			}
		}

		if(isset($cities[$area]))
		{
			return View::make('certification.identity');
			// ->with('area', $cities[$area]);
		}else{
			return View::make('certification.identity');
			// ->with('area', $cities);
		}

	}

	public function getSortOfUsername($letter = null)
	{
		$users =User::all();
		//以字母为键的数组
		$letters = array();
		foreach($users as $user)
		{
			$username = $user->username;
			//获取首字母
			$letter = getFirstCharter($username);
			//如果没有设置这个变量，就根据这个变量声明一个数组
			if(!isset($$letter))
			{
				$$letter = array();
			}
			array_push($$letter, $user);
			if(!isset($letters[$letter]))
			{
				$letters[$letter] = $$letter;
			}
		}

		if(isset($letters[$letter]))
		{
			return View::make('certification.identity');
			// ->with('letters', $letters[$letter]);
		}else{
			return View::make('certification.identity');
			// ->with('letters', $letters);
		}

	}
	// public function test()
	// {	
	// 	$users = array('张三',  '李四', '王麻子');
	// 	$cities = array();
	// 	foreach($users as $user)
	// 	{
	// 		$city = $user;
	// 		//将城市的名称变成变量名
	// 		if(!isset($$city))
	// 		{
	// 			$$city = array();
	// 		}
	// 		array_push($$city, $user);
	// 		if(!isset($cities[$city]))
	// 		{
	// 			$cities[$city] = $$city;
	// 		}
	// 	}

	// 	return View::make('test')->with('city', $cities['王麻子'][0]);
	// }
	public function test2() 
	{
		return getFirstCharter('真的吗');
	}
}


