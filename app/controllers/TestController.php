<?php

class TestController extends BaseController{

	
	public function test()
	{
		return 'man';
	}

	public function postTest()
	{
		$image = Input::get('image');

		dd($image);
	}

	public function test1()
	{
		return DB::table('topics')->orderBy('id', 'desc')->first()->id;
	}
}