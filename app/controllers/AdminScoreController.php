<?php

class AdminScoreController extends BaseController{

	public function score()
	{	
		$application_id	= Input::get('application_id');
		$score 		= Input::get('score');
		$score_details 	= Input::get('score_details');

		$data = array(
			'score' 		=> $score,
			'score_details' 	=> $score_details
		);
		$rules = array(
			'score' 		=> 'required|numeric',
			'score_details' 	=> 'required'
		);
		$messages = array(
			'required' 		=> 1,
			'score.numeric' 	=> 2
			);
		$validation  = Validator::make($data, $rules, $messages);

		if($validation->fails())
		{	
			$number = $validation->messages()->all();
			if($number[0] == 1)
				return Response::json(array('errCode'=>1, 'message'=>'信息填写不完整！'));
			if($number[0] == 2)
				return Response::json(array('errCode'=>2, 'message'=>'分数必须为数字！'));
		}

		$application  = Application::find($application_id);
		$application->score 			= $score;
		$application->score_details 	= $score_details;

		if(!$application->save())
		{
			return Response::json(array('errCode'=>3, 'message'=>'添加失败！'));
		} 

		return Response::json(array('errCode'=>0, 'message'=>'添加成功！'));
	}

	public function deleteScore()
	{
		$application_id 	= Input::get('application_id');
		$application 		= Application::find($application_id);

		if(!$application->delete())
		{
			return Response::json(array('errCode'=>1, 'message'=>'删除失败！'));
		}

		return Response::json(array('errCode'=>0, 'message'=>'删除成功！'));
	}
}
