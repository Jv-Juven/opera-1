<?php

//协会表演
class PerformancePageController extends BaseController{

	public function teacher()
	{	
		$teacher_count	= Teacher::count();
		$page			= ceil($teacher_count/6);
		$teachers		= Teacher::simplePaginate(6); 
		
		return View::make('home.comedy.comedy')->with(array(
				'teachers' 		=> $teachers,
				'page'			=> $page,
				'links' 			=>$this->link()
			));
	}

	public function teacherMore()
	{
		$teacher_id = Input::get('teacher_id');

		$teacher = Teacher::find($teacher_id);

		return View::make('home.comedy.comedy-details')->with(array(
				'teacher' 	=> $teacher,
				'links' 		=>$this->link()
				));
	}

	public function backStage()
	{
		$backstage_count 	= BackStage::count();
		$page 		= ceil($backstage_count/10);
		$backstages 		= BackStage::paginate(10);

		return View::make('home.comedy.before-behind')
			->with(array(
				'backstages' 		=> $backstages,
				'page'			=> $page,
				'backstage_count' 	=> $backstage_count,
				'links' 			=>$this->link()
			));
	}

	public function backStageMore()
	{
		$backstage_id = Input::get('backstage_id');

		$backstage = BackStage::find($backstage_id);

		return View::make('home.comedy.before-behind-details')->with(array(
				'backstage' 	=> $backstage,
				'links' 		=>$this->link()
				));
	}

	public function appreciation()
	{	
		$appreciation_count  = Appreciation::count();
		$page			 = ceil($appreciation_count/15);
		$appreciations 	 = Appreciation::paginate(4);
		return View::make('home.comedy.classic-case')->with('links',$this->link());
			// ->with(array(
			// 	'appreciations' => $appreciations,
			// 	'page'		  => $page
			// ));
	}

	public function appreciationMore()
	{
		$video_id = Input::get('video_id');

 		$video = Appreciation::find($video_id);

 		return View::make('视频')->with('video', $video)->with('links',$this->link()); 
	}
}
