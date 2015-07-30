<?php 

class StaticPageController extends BaseController{

	public function auth()
	{
		return View::make('apply.apply-online')->with('links',$this->link());
	}

	public function inquiry()
	{
		return View::make('apply.query-score')->with('links',$this->link());
	}
}