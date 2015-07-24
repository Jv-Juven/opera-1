<?php

class AdminShowController extends BaseController{

	//添加台前幕后
	public function addTeacher()
	{
		$avatar 		= Input::get('avatar');
		$chinese_name 	= Input::get('chinese_name');
		$foreign_name 	= Input::get('foreign_name');
		$country		= Input::get('country');
		$nation		= Input::get('nation');
		$birthplace		= Input::get('birthplace');
		$position		= Input::get('position');
		$social_post		= Input::get('social_post');
		$production		= Input::get('production');
		$per_description	= Input::get('per_description');

		$data = array(
			'avatar'		=> $avatar,
			'chinese_name'	=> $chinese_name,
			'foreign_name'	=> $foreign_name,
			'country'		=> $country,
			'nation'		=> $nation,
			'birthplace'		=> $birthplace,
			'position'		=> $position,
			'social_post'		=> $social_post,
			'production'		=> $production,
			'per_description'	=> $per_description
		);
		$rules = array(
			'avatar'		=> 'required|image',
			'chinese_name'	=> 'required',
			'foreign_name'	=> 'required|alpha',
			'country'		=> 'required',
			'nation'		=> 'required',
			'birthplace'		=> 'required',
			'position'		=> 'required',
			'social_post'		=> 'required',
			'production'		=> 'required',
			'per_description'	=> 'required'
		);
		$messages = array(
			'required'		=>1,
			'avatar.image'	=>2,
			'foreign_name.alpha'=>3
		);

		$validation  = Validator::make($data, $rules,$messages);

		if($validation->fails())
		{	
			$number = $validation->messages()->all();
			if($number[0] == 1)
				return Response::json(array('errCode'=>1, 'message'=>'信息填写不完整！'));
			if($number[0] == 2)
				return Response::json(array('errCode'=>2, 'message'=>'必须为jpeg, png, bmp 或 gif的图片格式！'));
			if($number[0] == 3)
				return Response::json(array('errCode'=>3, 'message'=>'外文名必须为字母！'));
		}

		$teacher = new Teacher;
		$teacher->avatar 		= $avatar;
		$teacher->chinese_name 	= $chinese_name;
		$teacher->foreign_name 	= $foreign_name;
		$teacher->country 		= $country;
		$teacher->nation 		= $nation;
		$teacher->birthplace 	= $birthplace;
		$teacher->position 		= $position;
		$teacher->social_post 	= $social_post;
		$teacher->production 	= $production;
		$teacher->per_description 	= $per_description;

		if(!$teacher->save())
		{
			return Response::json(array('errCode'=>4, 'message'=>'添加失败！'));
		} 

		return Response::json(array('errCode'=>0, 'message'=>'添加成功！'));
	}

	//编辑台前幕后
	public function editTeacher()
	{
		$teacher_id 		= Input::get('teacher_id');

		$avatar 		= Input::get('avatar');
		$chinese_name 	= Input::get('chinese_name');
		$foreign_name 	= Input::get('foreign_name');
		$country		= Input::get('country');
		$nation		= Input::get('nation');
		$birthplace		= Input::get('birthplace');
		$position		= Input::get('position');
		$social_post		= Input::get('social_post');
		$production		= Input::get('production');
		$per_description	= Input::get('per_description');

		$data = array(
			'avatar'		=> $avatar,
			'chinese_name'	=> $chinese_name,
			'foreign_name'	=> $foreign_name,
			'country'		=> $country,
			'nation'		=> $nation,
			'birthplace'		=> $birthplace,
			'position'		=> $position,
			'social_post'		=> $social_post,
			'production'		=> $production,
			'per_description'	=> $per_description
		);
		$rules = array(
			'avatar'		=> 'required|image',
			'chinese_name'	=> 'required',
			'foreign_name'	=> 'required|alpha',
			'country'		=> 'required',
			'nation'		=> 'required',
			'birthplace'		=> 'required',
			'position'		=> 'required',
			'social_post'		=> 'required',
			'production'		=> 'required',
			'per_description'	=> 'required'
		);
		$messages = array(
			'required'		=>1,
			'avatar.image'	=>2,
			'foreign_name.alpha'=>3
		);

		$validation  = Validator::make($data, $rules,$messages);

		if($validation->fails())
		{	
			$number = $validation->messages()->all();
			if($number[0] == 1)
				return Response::json(array('errCode'=>1, 'message'=>'信息填写不完整！'));
			if($number[0] == 2)
				return Response::json(array('errCode'=>2, 'message'=>'必须为jpeg, png, bmp 或 gif的图片格式！'));
			if($number[0] == 3)
				return Response::json(array('errCode'=>3, 'message'=>'外文名必须为字母！'));
		}

		$teacher 			= Teacher::find($teacher_id);
		$teacher->avatar 		= $avatar;
		$teacher->chinese_name 	= $chinese_name;
		$teacher->foreign_name 	= $foreign_name;
		$teacher->country 		= $country;
		$teacher->nation 		= $nation;
		$teacher->birthplace 	= $birthplace;
		$teacher->position 		= $position;
		$teacher->social_post 	= $social_post;
		$teacher->production 	= $production;
		$teacher->per_description 	= $per_description;

		if(!$teacher->save())
		{
			return Response::json(array('errCode'=>4, 'message'=>'编辑失败！'));
		}

		return Response::json(array('errCode'=>0, 'message'=>'编辑成功！'));
	}

	//删除戏剧百家
	public function deleteTeacher()
	{
		$$teacher_id = Input::get('$teacher_id');
		$teacher 	= Teacher::find($teacher_id);

		if(!$teacher_id->delete())
		{
			return Response::json(array('errCode'=>1, 'message'=>'删除失败！'));
		}

		return Response::json(array('errCode'=>0, 'message'=>'删除成功！'));
	}

	//添加台前幕后
	public function addBackstage()
	{
		$title 		= Input::get('title');
		$content 	= Input::get('content');

		$data = array(
			'title' 		=> $title,
			'content' 	=> $content
		);
		$rules = array(
			'title' 		=> 'required',
			'content' 	=> 'required'
		);
		$validation  = Validator::make($data, $rules);

		if($validation->fails())
		{
			return Response::json(array('errCode'=>1, 'message'=>'信息填写不完整！'));
		}

		$backstage 			= new Backstage;
		$backstage->title 		= $title;
		$backstage->content 	= $content;

		if(!$backstage->save())
		{
			return Response::json(array('errCode'=>2, 'message'=>'添加失败！'));
		} 

		return Response::json(array('errCode'=>0, 'message'=>'添加成功！'));
	}

	//编辑台前幕后
	public function editBackstage()
	{
		$backstage_id 	= Input::get('backstage_id');
		$title 			= Input::get('title');
		$content 		= Input::get('content');

		$data = array(
			'title' 		=> $title,
			'content' 	=> $content
		);
		$rules = array(
			'title' 		=> 'required',
			'content' 	=> 'required'
		);
		$validation  = Validator::make($data, $rules);

		if($validation->fails())
		{
			return Response::json(array('errCode'=>1, 'message'=>'信息填写不完整！'));
		}

		$backstage 			= Backstage::find($backstage_id);
		$backstage->title 		= $title;
		$backstage->content 	= $content;

		if(!$backstage->save())
		{
			return Response::json(array('errCode'=>2, 'message'=>'编辑失败！'));
		} 

		return Response::json(array('errCode'=>0, 'message'=>'编辑成功！'));
	}

	//删除台前幕后
	public function deleteBackstage()
	{
		$backstage_id 	= Input::get('backstage_id');
		$backstage 		= Backstage::find($backstage_id);

		if(!$backstage->delete())
		{
			return Response::json(array('errCode'=>1, 'message'=>'删除失败！'));
		}

		return Response::json(array('errCode'=>0, 'message'=>'删除成功！'));
	}

	//添加经典欣赏
	public function addAppreciation()
	{
		$title 		= Input::get('title');
		$video		= Input::get('video');

		$data = array(
			'title' 		=> $title,
			'video' 	=> $video	
		);
		$rules = array(
			'title' 		=> 'required',
			'video' 	=> 'required'
		);
		$validation  = Validator::make($data, $rules);

		if($validation->fails())
		{
			return Response::json(array('errCode'=>1, 'message'=>'信息填写不完整！'));
		}

		$appreciation 		= new Appreciation;
		$appreciation->title 		= $title;
		$appreciation->video	= $video;

		if(!$appreciation->save())
		{
			return Response::json(array('errCode'=>2, 'message'=>'添加失败！'));
		} 

		return Response::json(array('errCode'=>0, 'message'=>'添加成功！'));
	}

	//编辑经典欣赏
	public function editAppreciation()
	{
		$appreciation_id 	= Input::get('appreciation_id');
		$title 			= Input::get('title');
		$video			= Input::get('video');

		$data = array(
			'title' 		=> $title,
			'video' 	=> $video	
		);
		$rules = array(
			'title' 		=> 'required',
			'video' 	=> 'required'
		);
		$validation  = Validator::make($data, $rules);

		if($validation->fails())
		{
			return Response::json(array('errCode'=>1, 'message'=>'信息填写不完整！'));
		}

		$appreciation			= Appreciation::find($appreciation_id);
		$appreciation->title 		= $title;
		$appreciation->video	= $video;

		if(!$appreciation->save())
		{
			return Response::json(array('errCode'=>2, 'message'=>'编辑失败！'));
		} 

		return Response::json(array('errCode'=>0, 'message'=>'编辑成功！'));
	}

	////删除经典欣赏
	public function deleteAppreciation()
	{
		$appreciation_id	= Input::get('appreciation_id');
		$appreciation 	= Appreciation_id::find($appreciation_id);

		if(!$appreciation->delete())
		{
			return Response::json(array('errCode'=>1, 'message'=>'删除失败！'));
		}

		return Response::json(array('errCode'=>0, 'message'=>'删除成功！'));
	}
}