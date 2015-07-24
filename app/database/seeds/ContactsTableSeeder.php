<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ContactsTableSeeder extends Seeder {

	public function run()
	{
			ContactUs::create([
				'number' => 13246860389,
				'people'  => '小伙儿',
				'postcode' => '666666',
				'address' => '你猜你猜你猜猜猜',
				'site' => '不告诉你！'
			]);
	}

}