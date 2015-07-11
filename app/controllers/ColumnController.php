<?php

class ColumnController extends BaseController
{
	public function getColumnInfo()
	{
		$columns = EnlightenColumn::paginate(15);

		return View::make('启蒙专栏')->with('columns', $columns);
	}

	public function getColumnInfoMore()
	{
		$column_id = Input::get('column_id');

		$column = EnlightenColumn::find($column);
		
		 return View::make('启蒙专栏详细信息')->with('column', $column);
	}

	public function getSocietyInfo()
	{
		$societies= SocietyDynamics::paginate(15);

		return View::make('学会动态')->with('societies', $societies);
	}

	public function getSocietyInfoMore()
	{
		$society_id = Input::get('society_id');

		$society = SocietyDynamics::find($society);
		
		return View::make('学会动态')->with('society', $society);
	}

	public function getAssociationInfo()
	{
		$data = AssociationDynamics::paginate(15);

		return View::make('协会动态')->with('data', $data);
	}

	public function getAssociationInfoMore()
	{
		$association_id = Input::get('association_id');

		$association = AssociationDynamics::find('association_id');

		return View::make('协会动态')->with('association', $association);
	}

	public function getOneTopic()
	{
		$topic = DB::table('topics')->orderBy('id', 'desc')->first();

		$topic_comments = $topic->hasManyTopicComments; 

		return View::make('话题论谈')->with(array(
			'topic'=>$topic, 
			'topic_comments'=>$topic_comments
			));
	}

	public function getTopicCommentMore()
	{
		$topic_id = Input::get('topic_id');

		$topic = Topic::find($topic_id);

		$comments = $topic->hasManyTopicComments;

		return View::make('话题评论内容')->with('comments', $comments);
	}
}