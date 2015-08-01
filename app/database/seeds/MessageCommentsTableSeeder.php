<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MessageCommentsTableSeeder extends Seeder {

	public function run()
	{
		MessageComment::create([
			'sender_id' => 4,
			'receiver_id' => 1,
			'message_id' =>1,
			'content' => '我要评论留言，评论留言'
		]);

		MessageComment::create([
			'sender_id' => 4,
			'receiver_id' => 1,
			'message_id' =>1,
			'content' => '我要评论留言，评论留言'
		]);

		MessageComment::create([
			'sender_id' => 4,
			'receiver_id' => 1,
			'message_id' =>1,
			'content' => '我要评论留言，评论留言'
		]);

	}

}