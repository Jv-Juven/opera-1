<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MessageCommentsTableSeeder extends Seeder {

	public function run()
	{
		MessageComment::create([
			'user_id' => 4,
			'message_id' =>1,
			'content' => '我要评论留言，评论留言'
		]);

		MessageComment::create([
			'user_id' => 4,
			'message_id' =>1,
			'content' => '我要评论留言，评论留言'
		]);

		MessageComment::create([
			'user_id' => 4,
			'message_id' =>1,
			'content' => '我要评论留言，评论留言'
		]);

		MessageComment::create([
			'user_id' => 4,
			'message_id' =>1,
			'content' => '我要评论留言，评论留言'
		]);

		MessageComment::create([
			'user_id' => 4,
			'message_id' =>2,
			'content' => '我要评论留言，评论留言'
		]);

		MessageComment::create([
			'user_id' => 4,
			'message_id' =>2,
			'content' => '我要评论留言，评论留言'
		]);

		MessageComment::create([
			'user_id' => 4,
			'message_id' =>2,
			'content' => '我要评论留言，评论留言'
		]);

		MessageComment::create([
			'user_id' => 4,
			'message_id' =>2,
			'content' => '我要评论留言，评论留言'
		]);
	}

}