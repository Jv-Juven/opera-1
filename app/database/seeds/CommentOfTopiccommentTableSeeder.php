<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CommentOfTopiccommentTableSeeder extends Seeder {

	public function run()
	{
		CommentOfTopiccomment::create([
			'sender_id' => 2,
			'receiver_id' => 1,
			'topiccomment_id' =>1,
			'topic_id' => 1,
			'content' => '戏剧带给你不一样的生活体验，发扬传统文化，传承中国文明，应好好珍惜现在的好时代，去到外面，漂洋过海。'
		]);

		CommentOfTopiccomment::create([
			'sender_id' => 3,
			'receiver_id' => 2,
			'topiccomment_id' =>2,
			'topic_id' => 1,
			'content' => '戏剧带给你不一样的生活体验，发扬传统文化，传承中国文明'
		]);

		CommentOfTopiccomment::create([
			'sender_id' => 1,
			'receiver_id' => 2,
			'topiccomment_id' => 3,
			'topic_id' => 1,
			'content' => '发扬传统文化，传承中国文明'
		]);

		CommentOfTopiccomment::create([
			'sender_id' => 3,
			'receiver_id' => 1,
			'topiccomment_id' => 3,
			'topic_id' => 1,
			'content' => '神回复4'
		]);

	}

}