<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		
		User::create([
			'username' => 'alex1',
			'avatar' => 'http://7xk6xh.com1.z0.glb.clouddn.com/avatar.png',
			'password' => '666666'
		]);

		User::create([
			'username' => 'alex2',
			'avatar' => 'http://7xk6xh.com1.z0.glb.clouddn.com/avatar.png',
			'password' => '666666'
		]);

		User::create([
			'username' => 'alex3',
			'avatar' => 'http://7xk6xh.com1.z0.glb.clouddn.com/avatar.png',
			'password' => '666666'
		]);

		User::create([
			'username' => 'admin',
			'avatar' => 'http://7xk6xh.com1.z0.glb.clouddn.com/avatar.png',
			'password' => '666666',
			'role_id' =>3
		]);

	}

}