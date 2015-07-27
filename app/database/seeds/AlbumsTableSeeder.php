<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AlbumsTableSeeder extends Seeder {

	public function run()
	{
		Album::create([
			'user_id' => '1',
			'title' => '戏剧人生，人生戏剧',
		]);
		Album::create([
			'user_id' => '1',
			'title' => '戏剧人生，人生戏剧',
		]);
		Album::create([
			'user_id' => '1',
			'title' => '戏剧人生，人生戏剧',
		]);
		Album::create([
			'user_id' => '1',
			'title' => '戏剧人生，人生戏剧',
		]);
		Album::create([
			'user_id' => '1',
			'title' => '戏剧人生，人生戏剧',
		]);
		Album::create([
			'user_id' => '1',
			'title' => '戏剧人生，人生戏剧',
		]);

	}

}