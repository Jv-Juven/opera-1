<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CommentOfTopiccommentTableSeeder extends Seeder {

	public function run()
	{
		CommentOfTopiccomment::create([
			'sender_id' => 13,
			'receiver_id' => 5,
			'topiccomment_id' =>4,
			'topic_id' => 2,
			'content' => '戏剧带给你不一样的生活体验，发扬传统文化，传承中国文明，应好好珍惜现在的好时代，去到外面，漂洋过海。'
		]);

		CommentOfTopiccomment::create([
			'sender_id' => 17,
			'receiver_id' => 6,
			'topiccomment_id' =>5,
			'topic_id' => 2,
			'content' => '戏剧带给你不一样的生活体验，发扬传统文化，传承中国文明'
		]);

		CommentOfTopiccomment::create([
			'sender_id' => 10,
			'receiver_id' => 7,
			'topiccomment_id' => 6,
			'topic_id' => 2,
			'content' => '发扬传统文化，传承中国文明'
		]);

		CommentOfTopiccomment::create([
			'sender_id' => 8,
			'receiver_id' => 5,
			'topiccomment_id' => 4,
			'topic_id' => 2,
			'content' => '发扬传统文化，传承中国文明'
		]);

	}

}