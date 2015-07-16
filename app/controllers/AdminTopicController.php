<?php
class AdminTopicController extends Eloquent{

	public function addColumn()
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

		$column = new EnlightenColumn;
		$column->title 	= $title;
		$column->content 	= $content;

		if(!$column->save())
		{
			return Response::json(array('errCode'=>2, 'message'=>'添加失败！'));
		} 

		return Response::json(array('errCode'=>0, 'message'=>'添加成功！'));
	}

	public function editColumn()
	{
		$column_id 	= Input::get('column_id');
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

		$column = EnlightenColumn::find($column_id);
		$column->title 	= $title;
		$column->content 	= $content;

		if(!$column->save())
		{
			return Response::json(array('errCode'=>2, 'message'=>'编辑失败！'));
		} 

		return Response::json(array('errCode'=>0, 'message'=>'编辑成功！'));
	}

	public function deleteColumn()
	{
		$column_id 	= Input::get('column_id');
		$column 	= EnlightenColumn::find($column_id);

		if(!$column->delete())
		{
			return Response::json(array('errCode'=>1, 'message'=>'删除失败！'));
		}

		return Response::json(array('errCode'=>0, 'message'=>'删除成功！'));
	}

	public function addSociety()
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

		$society = new SocietyDynamics;
		$society->title 	= $title;
		$society->content 	= $content;

		if(!$society->save())
		{
			return Response::json(array('errCode'=>2, 'message'=>'添加失败！'));
		} 

		return Response::json(array('errCode'=>0, 'message'=>'添加成功！'));
	}

	public function editSociety()
	{
		$society_id 	= Input::get('society_id');
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

		$society = SocietyDynamics::find($society_id);
		$society->title 	= $title;
		$society->content 	= $content;

		if(!$society->save())
		{
			return Response::json(array('errCode'=>2, 'message'=>'编辑失败！'));
		} 

		return Response::json(array('errCode'=>0, 'message'=>'编辑成功！'));
	}

	public function deleteSociety()
	{
		$society_id 	= Input::get('society_id');
		$society 	= SocietyDynamics::find($society_id);

		if(!$society->delete())
		{
			return Response::json(array('errCode'=>1, 'message'=>'删除失败！'));
		}

		return Response::json(array('errCode'=>0, 'message'=>'删除成功！'));
	}

	public function addAssociation()
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

		$association = new AssociationDynamics;
		$association->title 		= $title;
		$association->content 	= $content;

		if(!$association->save())
		{
			return Response::json(array('errCode'=>2, 'message'=>'添加失败！'));
		} 

		return Response::json(array('errCode'=>0, 'message'=>'添加成功！'));
	}

	public function editAssociation()
	{
		$association_id 	= Input::get('association_id');
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

		$association 			= AssociationDynamics::find($association_id);
		$association->title 		= $title;
		$association->content 	= $content;

		if(!$association->save())
		{
			return Response::json(array('errCode'=>2, 'message'=>'编辑失败！'));
		} 

		return Response::json(array('errCode'=>0, 'message'=>'编辑成功！'));
	}

	public function deleteAssociation()
	{
		$association_id 	= Input::get('association_id');
		$association 		= AssociationDynamics::find($association_id);

		if(!$column->delete())
		{
			return Response::json(array('errCode'=>1, 'message'=>'删除失败！'));
		}

		return Response::json(array('errCode'=>0, 'message'=>'删除成功！'));
	}
}