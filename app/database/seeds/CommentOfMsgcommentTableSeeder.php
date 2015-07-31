<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CommentOfMsgcommentTableSeeder extends Seeder {

	public function run()
{
		CommentOfMsgcomment::create([
			'user_id' => 1,
			'messagecomment_id' => 1,
			'content' => '我要评论回复！'
		]);

		CommentOfMsgcomment::create([
			'user_id' => 2,
			'messagecomment_id' => 1,
			'content' => '我要评论回复！'
		]);

		CommentOfMsgcomment::create([
			'user_id' => 3,
			'messagecomment_id' => 1,
			'content' => '我要评论回复！'
		]);

		CommentOfMsgcomment::create([
			'user_id' => 1,
			'messagecomment_id' => 2,
			'content' => '我要评论回复！'
		]);

		CommentOfMsgcomment::create([
			'user_id' => 2,
			'messagecomment_id' => 2,
			'content' => '我要评论回复！'
		]);

		CommentOfMsgcomment::create([
			'user_id' => 3,
			'messagecomment_id' => 2,
			'content' => '我要评论回复！'
		]);
	}

}