<?php

class ColumnPageController extends BaseController{

	//启蒙专栏
	public function getColumnInfo()
	{	
		
		$column_count	=  EnlightenColumn::count();
		$page 		=  ceil($column_count/10);
		$columns 		=  EnlightenColumn::simplePaginate(10);

		return View::make('communication.enlighten')
			->with(array(
				'columns'		=> $columns,
				'page'			=> $page,
				'column_count' 	=> $column_count,
				'links' 			=>$this->link()
			));
	}

	public function getColumnInfoMore()
	{
		$column_id = Input::get('column_id');

		$column = EnlightenColumn::find($column_id);
		
		 return View::make('communication.enlighten-more')->with(array(
		 			'column' 	=> $column,
		 			'links' 		=>$this->link()
		 			));
	}

	//学会动态
	public function getSocietyInfo()
	{	
		$society_count	= SocietyDynamics::count();
		$page 		=  ceil($society_count/10);
		$societies= SocietyDynamics::paginate(10);

		return View::make('communication.masterdynamic')
			->with(array(
				'societies' 		=> $societies,
				'page'	      		=> $page,
				'society_count' 	=> $society_count,
				'links' 			=>$this->link()
			));
	}

	public function getSocietyInfoMore()
	{
		$society_id = Input::get('society_id');

		$society = SocietyDynamics::find($society_id);
		
		return View::make('communication.masterdynamic-more')->with(array(
							'society' => $society,
							'links' 	=>$this->link()
							));
	}

	//协会动态
	public function getAssociationInfo()
	{
		$association_count = AssociationDynamics::count();
		$page			= ceil($association_count/10);
		$associations 	= AssociationDynamics::paginate(10);

		return View::make('communication.societydynamic')
				->with(array(
				'associations'	 	=> $associations,
				'page' 			=> $page,
				'association_count'	 => $association_count,
				'links' 			=>$this->link()
		));
	}

	public function getAssociationInfoMore()
	{
		$association_id = Input::get('association_id');
		$association = AssociationDynamics::find($association_id);
		return View::make('communication.societydynamic-more')->with(array(
				'association' 	=> $association,
				'links' 		=>$this->link()
				));
	}

	public function getOneTopic()
	{	
		//获取最新的那个话题
		$topic = Topic::orderBy('id', 'asc')->first();
		if($topic != null)
		{	//话题人的信息
			$user_id 		= $topic->user_id;
			$user 			= User::find($user_id);
			//话题评论
			$topic_comments 	= $topic->hasManyTopicComments()->get(); 
			$comment_name 	= array();
			if($topic_comments != null)
			{	
				$commentCount = $topic_comments->count();
				foreach($topic_comments as $topic_comment)
				{	//评论人的信息	
					$user_id 			= $topic_comment->user_id;
					$name 			= User::find($user_id)->username;
					$comment_name[$user_id] = $name;
				}

				return View::make('communication.topics')->with(array(
					'topic'=>$topic, 
					'topic_comments'=>$topic_comments,
					'commentCount' => $commentCount,
					'comment_name' => $comment_name,
					'user' 		=>$user,
					'links' 		=>$this->link()
					));
			}
		}
		return View::make('communication.topics')->with('links',$this->link());
				// ->with(array(
				// 'topic'=>$topic, 
				// 'topic_comments'=>$topic_comments,
				// 'commentCount' => $commentCount,
				// 'comment_name' => $comment_name,
				// 'user' => $user
				// ));
	}

	//话题评论内容
	public function getTopicCommentMore()
	{
		$topic_id = Input::get('topic_id');

		$topic = Topic::find($topic_id);

		$comments = $topic->hasManyTopicComments;

		return View::make('话题评论内容')->with('comments', $comments)->with('links',$this->link());
	}
}