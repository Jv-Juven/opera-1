<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CommentOfTopiccommentTableSeeder extends Seeder {

	public function run()
	{
		CommentOfTopiccomment::create([
			'user_id' => 4,
			'topiccomment_id' =>1,
			'content' => '神回复'
		]);

		CommentOfTopiccomment::create([
			'user_id' => 4,
			'topiccomment_id' =>2,
			'content' => '神回复'
		]);

		CommentOfTopiccomment::create([
			'user_id' => 4,
			'topiccomment_id' =>3,
			'content' => '神回复'
		]);

	}

}