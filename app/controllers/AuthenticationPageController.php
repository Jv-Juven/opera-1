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
				return View::make('certification.identity')->with('dance_associations', $dance_associations);
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

	//按所在城市分类
	public function getSortOfCity($area = null)
	{	
		$users = User::where('role_id', '=', 0)->get();
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
			$cities[$city] = $$city;
		}

		if($area != null)
		{	
			$selection = array(
				'北京市','天津市','河北省','山西省','内蒙古自治区','辽宁省',
				'吉林省','黑龙江省','上海市','江苏省','浙江省','安徽省',
				'福建省','江西省','山东省','河南省','湖北省','湖南省',
				'广东省','广西壮族自治区','海南省','重庆市','四川省','贵州省','云南省',
				'西藏自治区','陕西省','甘肃省','青海省','宁夏回族自治区','新疆维吾尔自治区',
				'台湾省','香港特别行政区', '澳门特别行政区','海外','其他');
			$area = $selection[$area];

			if(isset($cities[$area]))
			{	
				//判断类别
				$num = 1;
				return View::make('certification.area')->with(array(
				'area' => $cities[$area],
				'num' => $num
				));
			}
				$num = 2;
			return View::make('certification.area')->with('num',$num);
			return Redirect::to('/customer/authentication/city');
		}else{
				$num = 0;
			return View::make('certification.area')->with(array(
				'area' =>$cities,
				'num' =>$num
				));
		}

	}

	public function getSortOfUsername($ABC = null)
	{
		$users =User::where('role_id', '=', 0)->get();
		//以字母为键的数组
		$letters = array();
		foreach($users as $user)
		{
			$username = $user->realname;
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
			$letters[$letter] = $$letter;
		}

		if($ABC != null)
		{
			if(isset($letters[$ABC]))
			{
				return View::make('certification.username')->with(array(
					'letters' => $letters[$ABC],
					'letter'  => $ABC
					));
			}
			return Redirect::back();
		}else{
			return View::make('certification.username')->with('letters', $letters);
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


