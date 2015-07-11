<?php

//协会表演
class PerformanceController extends BaseController
{
	public function teacher()
	{
		$teachers = DB::table('teachers')->orderBy('created_at', 'desc')->take(6)->get();
		
		return View::make('戏剧家页')->with('teachers', $teachers);
	}

	public function teacherMore()
	{
		$teacher_id = Input::get('teacher_id');

		$teacher = Teacher::find($teacher_id);

		return View::make('戏剧家详细信息')->with('teacher', $teacher);
	}

	public function backStage()
	{
		$backstages = BackStage::paginate(15);

		return View::make('台前幕后页面')->with('backstages', $backstages);
	}

	public function backStageMore()
	{
		$backstage_id = Input::get('backstage_id');

		$backstage = BackStage::find($backstage_id);

		return View::make('台前幕后详细信息')->with('backstage', $backstage);
	}

	public function appreciation()
	{
		$appreciation = Appreciation::paginate(4);

		return View::make('经典欣赏')->with('appreciation', $appreciation);
	}

	public function appreciationMore()
	{
		$video_id = Input::get('video_id');

 		$video = Appreciation::find($video_id);

 		return View::make('视频')->with('video', $video); 
	}
}
