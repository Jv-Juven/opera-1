<?php

class AdminPageController extends BaseController{
	
	//首页海报
	public function poster()
	{
		$images = Poster::paginate(3);

		return View::make('首页海报')->with('images', $images);
	}

	//联系我们
	public function contactUs()
	{
		$contact = contactUs::find(1);

		return View::make('联系我们')->with('contact', $contact);
	}

	//友情链接
	public function link()
	{
		$links = Link::paginate(10);

		return View::make('友情链接')->with('links', $links);
	}

	//启蒙专栏
	public function column()
	{
		$columns = EnlightenColumn::paginate(10);

		return View::make('启蒙专栏')->with('columns', $columns);
	}

	//学会动态
	public function society()
	{
		$societies = SocietyDynamics::paginate(10);

		return View::make('学会动态')->with('societies', $societies);
	}

	//协会动态
	public function association()
	{
		$associations = AssociationDynamics::paginate(10);

		return View::make('协会动态')-with('associations', $associations);
	}

	//招贤纳士
	public function employment()
	{
		$employments = Employ::paginate(10);

		return View::make('招贤纳士')->with('employments', $employments)
	}

	//戏剧百家
	public function teacher()
	{
		$teachers = Teacher::paginate(10);

		return View::make('戏剧百家')->with('teachers', $teachers);
	}
	
	//台前幕后
	public function backstage()
	{
		$backstages = Backstage::paginate(10);

		return View::make('台前幕后')->with('backstages', $backstages);
	}

	//经典欣赏
	public function appreciation()
	{
		$appreciations = Appreciation::paginate(10);

		return View::make('经典欣赏')->('appreciations', $appreciation);
	}

	//成绩查询
	public function score()
	{
		$scores = Application::paginate(10);

		return View::make('成绩查询')->with('scores', $scores);
	}

	//认证
	public function authentication()
	{
		$authentications = User::where('role_id', '=', '2')->paginate(15);

		return View::make('认证')->with('authentications', $authentications);
	}
}
