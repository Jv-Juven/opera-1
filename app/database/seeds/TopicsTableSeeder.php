<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TopicsTableSeeder extends Seeder {

	public function run()
	{
		Topic::create([
			'user_id' => 21,
			'title' => '戏剧人生，人生戏剧',
			'content' =>'戏剧的道路很长很长，多久才能走完，我曾经这样的问我，路在何方，在何方，其实没有荆棘的道路该有多凄凉'
		]);
	}

}