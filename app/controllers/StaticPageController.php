<?php 

class StaticPageController extends BaseController{

	public function auth()
	{
		return View::make('apply.apply-online');
	}

	public function inquiry()
	{
		return View::make('apply.query-score');
	}
}