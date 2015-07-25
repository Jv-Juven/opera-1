<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PostersTableSeeder extends Seeder {

	public function run()
	{
			Poster::create([
				'image' => 'http://7xk6xh.com1.z0.glb.clouddn.com/home_page.png'
			]);

			Poster::create([
				'image' => 'http://7xk6xh.com1.z0.glb.clouddn.com/home_page.png'
			]);

	}

}