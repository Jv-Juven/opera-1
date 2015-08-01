<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CommentOfTopiccommentTableSeeder extends Seeder {

	public function run()
	{
		CommentOfTopiccomment::create([
			'sender_id' => 3,
			'receiver_id' => 2
			'topiccomment_id' =>1,
			'topic_id' => 1
			'content' => '神回复1'
		]);

		CommentOfTopiccomment::create([
			'sender_id' => 4,
			'receiver_id' => 3,
			'topiccomment_id' =>2,
			'topic_id' => 1,
			'content' => '神回复2'
		]);

		CommentOfTopiccomment::create([
			'sender_id' => 1,
			'receiver_id' => 4,
			'topiccomment_id' => 3,
			'topic_id' => 1,
			'content' => '神回复3'
		]);

		CommentOfTopiccomment::create([
			'sender_id' => 2,
			'receiver_id' => 1,
			'topiccomment_id' => 3,
			'topic_id' => 1,
			'content' => '神回复4'
		]);

	}

}