<?php

class EmployController extends BaseController{

	public function employment()
	{
		$employment_count = Employment::count();
		$page			= ceil($employment_count/15);
		$employments	= Employment::paginate(15);

		return View::make('招贤纳士')->with(array(
				'employments' 	=> $employments,
				'page'			=> $page,
				'employment_count'  => $employment_count
			));
	}

	public function employmentMore()
	{
		$employment_id = Input::get('employment_id');

		$employment = Employment::find($employment_id);

		return View::make('招贤纳士详细页面')->with('employment', $employment);
	}
}