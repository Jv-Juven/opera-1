<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TopicCommentsTableSeeder extends Seeder {

	public function run()
	{
		TopicComment::create([
			'content'=>'你这样说真的好吗？不知君何想如此，妙哉否，欢快否！',
			'user_id' => 4,
			'topic_id'=>2,
		]);
		TopicComment::create([
			'content'=>'你这样说真的好吗？不知君何想如此，妙哉否，欢快否！',
			'user_id' => 3,
			'topic_id'=>2,
		]);
		TopicComment::create([
			'content'=>'你这样说真的好吗？不知君何想如此，妙哉否，欢快否！',
			'user_id' =>2,
			'topic_id'=>2,
		]);
	}
}