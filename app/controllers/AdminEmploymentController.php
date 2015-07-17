<?php

class AdminEmploymentController extends BaseController{

	public function addEmployment()
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

		$employment 		= new Employment;
		$employment->title 		= $title;
		$employment->content 	= $content;

		if(!$employment->save())
		{
			return Response::json(array('errCode'=>2, 'message'=>'添加失败！'));
		} 

		return Response::json(array('errCode'=>0, 'message'=>'添加成功！'));
	}

	public function editEmployment()
	{
		$employment_id 	= Input::get('employment_id');
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

		$employment 		= Employment::find($employment_id);
		$employment->title 		= $title;
		$employment->content 	= $content;

		if(!$employment->save())
		{
			return Response::json(array('errCode'=>2, 'message'=>'编辑失败！'));
		} 

		return Response::json(array('errCode'=>0, 'message'=>'编辑成功！'));
	}

	public function deleteEmployment()
	{
		$employment_id 	= Input::get('employment_id');
		$employment 	= Employment::find($employment_id);

		if(!$employment->delete())
		{
			return Response::json(array('errCode'=>1, 'message'=>'删除失败！'));
		}

		return Response::json(array('errCode'=>0, 'message'=>'删除成功！'));
	}
}