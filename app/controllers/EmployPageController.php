<?php

class EmployPageController extends BaseController{

	public function employment()
	{
		$employment_count 	= Employment::count();
		$page			= ceil($employment_count/15);
		$employments		= Employment::paginate(15);

		return View::make('join.join')->with('links',$this->link());
			// ->with(array(
			// 	'employments' 	=> $employments,
			// 	'page'			=> $page,
			// 	'employment_count'  => $employment_count
			// ));
	}

	public function employmentMore()
	{
		$employment_id = Input::get('employment_id');

		$employment = Employment::find($employment_id);

		return View::make('招贤纳士详细页面')->with(array(
			'employment'	=>$employment,
			'links' 		=>$this->link()
			));
	}
}