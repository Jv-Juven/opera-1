<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ContactsTableSeeder extends Seeder {

	public function run()
	{
			ContactUs::create([
				'number' => 13232323232,
				'people'  => '林小姐',
				'postcode' => '666666',
				'address' => '广州市天河区水荫路34号省文化厅大院演音大楼205',
				'site' => 'wwwgzhm.com'
			]);
	}

}