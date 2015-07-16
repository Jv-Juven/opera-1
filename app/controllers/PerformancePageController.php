<?php

//协会表演
class PerformanceController extends BaseController
{
	public function teacher()
	{	
		$teacher_count	= Teacher::count();
		$page			= ceil($teacher_count/15);
		$teachers		= Teacher::paginate(15); 
		
		return View::make('戏剧家页')->with(array(
				'teachers' 		=> $teachers,
				'page'			=> $page,
			));
	}

	public function teacherMore()
	{
		$teacher_id = Input::get('teacher_id');

		$teacher = Teacher::find($teacher_id);

		return View::make('戏剧家详细信息')->with('teacher', $teacher);
	}

	public function backStage()
	{
		$backstage_count 	= BackStage::count();
		$page 		= ceil($backstage_count/15);
		$backstages 		= BackStage::paginate(15);

		return View::make('台前幕后页面')->with(array(
				'backstages' 		=> $backstages,
				'page'			=> $page,
				'backstage_count' 	=> $backstage_count
			));
	}

	public function backStageMore()
	{
		$backstage_id = Input::get('backstage_id');

		$backstage = BackStage::find($backstage_id);

		return View::make('台前幕后详细信息')->with('backstage', $backstage);
	}

	public function appreciation()
	{	
		$appreciation_count  = Appreciation::count();
		$page			 = ceil($appreciation_count/15);
		$appreciations 	 = Appreciation::paginate(4);
		return View::make('经典欣赏')->with(array(
				'appreciations' => $appreciations,
				'page'		  => $page
			));
	}

	public function appreciationMore()
	{
		$video_id = Input::get('video_id');

 		$video = Appreciation::find($video_id);

 		return View::make('视频')->with('video', $video); 
	}
}
