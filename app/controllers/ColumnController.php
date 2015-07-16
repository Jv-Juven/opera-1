<?php

class ColumnController extends BaseController
{
	public function getColumnInfo()
	{	
		
		$column_count	=  EnlightenColumn::count();
		$page 		=  ceil($column_count/15);
		$columns 		=  EnlightenColumn::paginate(15);

		return View::make('启蒙专栏')->with(array(
				'columns'		=> $columns,
				'page'			=> $page,
				'column_count' 	=> $column_count
			));
	}

	public function getColumnInfoMore()
	{
		$column_id = Input::get('column_id');

		$column = EnlightenColumn::find($column);
		
		 return View::make('启蒙专栏详细信息')->with('column', $column);
	}

	public function getSocietyInfo()
	{	
		$society_count	= SocietyDynamics::count();
		$page 		=  ceil($society_count/15);
		$societies= SocietyDynamics::paginate(15);

		return View::make('学会动态')->with(array(
				'societies' 		=> $societies,
				'page'	      		=> $page,
				'society_count' 	=> $society_count
			));
	}

	public function getSocietyInfoMore()
	{
		$society_id = Input::get('society_id');

		$society = SocietyDynamics::find($society);
		
		return View::make('学会动态')->with('society', $society);
	}

	public function getAssociationInfo()
	{
		$association_count = AssociationDynamics::cunt();
		$page			= ceil($association_count/15);
		$associations 	= AssociationDynamics::paginate(15);

		return View::make('协会动态')->with(array(
				'associations '	 => $associations,
				'page' 			=> $page,
				'association_count'	 => $association_count
		));
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
		if($topic != null)
		{
			$user_id 		= $topic->user_id;
			$topic['name'] 	= User::find($user_id)->username;
			$topic['avatar'] 	= User::find($user_id)->avatar;

			$topic_comments = $topic->hasManyTopicComments()->get(); 
			if($topic_comments != null)
			{
				$topic['commentCount'] = $topic_comments->count();
				foreach($topic_comments as $topic_comment)
				{	
					$user_id 			= $topic_comment->user_id;
					$topic_comment['name'] 	= User::find($user_id)->username;
				}
			}
		}
		if(isset($topic_comments))
		{
			return View::make('话题论谈')->with(array(
				'topic'=>$topic, 
				'topic_comments'=>$topic_comments
				));
		}

		return View::make('话题论谈')->with(array(
			'topic'=>$topic, 
			'topic_comments'=>array()
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