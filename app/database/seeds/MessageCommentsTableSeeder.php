<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MessageCommentsTableSeeder extends Seeder {

	public function run()
	{
		MessageComment::create([
			'sender_id' => 6,
			'receiver_id' => 4,
			'message_id' =>1,
			'content' => '戏剧带给你不一样的生活体验，发扬传统文化，传承中国文明，应好好珍惜现在的好时代，去到外面，漂洋过海。'
		]);

		MessageComment::create([
			'sender_id' => 5,
			'receiver_id' => 4,
			'message_id' =>1,
			'content' => '戏剧带给你不一样的生活体验，发扬传统文化，传承中国文明，应好好珍惜现在的好时代，去到外面，漂洋过海。'
		]);

		MessageComment::create([
			'sender_id' => 7,
			'receiver_id' => 4,
			'message_id' =>1,
			'content' => '戏剧带给你不一样的生活体验，发扬传统文化，传承中国文明，应好好珍惜现在的好时代，去到外面，漂洋过海。'
		]);

	}

}