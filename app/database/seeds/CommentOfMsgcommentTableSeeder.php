<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CommentOfMsgcommentTableSeeder extends Seeder {

	public function run()
{
		CommentOfMsgcomment::create([
			'sender_id' => 4,
			'receiver_id' => 1,
			'messagecomment_id' => 1,
			'content' => '我要评论回复1！'
		]);

		CommentOfMsgcomment::create([
			'sender_id' => 1,
			'receiver_id' => 4,
			'messagecomment_id' => 1,
			'content' => '我要评论回复2！'
		]);

		CommentOfMsgcomment::create([
			'sender_id' => 1,
			'receiver_id' => 3,
			'messagecomment_id' => 1,
			'content' => '我要评论回复3！'
		]);

		CommentOfMsgcomment::create([
			'sender_id' => 2,
			'receiver_id' => 1,
			'messagecomment_id' => 2,
			'content' => '我要评论回复4！'
		]);

		CommentOfMsgcomment::create([
			'sender_id' => 2,
			'receiver_id' => 3,
			'messagecomment_id' => 2,
			'content' => '我要评论回复5！'
		]);

		CommentOfMsgcomment::create([
			'sender_id' => 3,
			'receiver_id' => 1,
			'messagecomment_id' => 2,
			'content' => '我要评论回复6！'
		]);
	}

}