<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{	
		$posters	= Poster::all();
		$columns 	= EnlightenColumn::orderBy('created_at', 'desc')->take(8)->get();
		$backstages 	= BackStage::orderBy('created_at', 'desc')->take(8)->get();
		$contacts 	= ContactUs::all();
		$contact 	= $contacts[0];
		$links		= Link::all();
		return View::make('home.home', array(
			'posters'	=>$posters,
			'columns'	=>$columns,
			'backstages'	=>$backstages,
			'contact'	=>$contact,
			'links' 		=> $links
			));
	}

}
