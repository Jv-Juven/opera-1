<?php

class RecruitController extends BaseController{

	public function getRecruitment()
	{
		$recruitments = DB::table('recruitments')->orderBy('created_at', 'desc')->take(3)->get();

		return View::make('招贤纳士')->with('recruitments', $recruitments);
	}
}