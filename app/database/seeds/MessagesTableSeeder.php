<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MessagesTableSeeder extends Seeder {

	public function run()
	{
		Message::create([
			'receiver_id' =>  1,
			'sender_id' => 2,
			'content' => '其实不应该是这样的，你完全不理解戏曲的重要性，我们做的是什么，热爱，对生活的向往，向阳！',
		]);
		Message::create([
			'receiver_id' =>  1,
			'sender_id' => 3,
			'content' => '其实不应该是这样的，你完全不理解戏曲的重要性，我们做的是什么，热爱，对生活的向往，向阳！',
		]);
		Message::create([
			'receiver_id' =>  1,
			'sender_id' => 4,
			'content' => '其实不应该是这样的，你完全不理解戏曲的重要性，我们做的是什么，热爱，对生活的向往，向阳！',
		]);


		
	}

}