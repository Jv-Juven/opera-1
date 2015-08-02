<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		
		User::create([
			'username' => 'alex',
			'avatar' => 'http://7xk6xh.com1.z0.glb.clouddn.com/avatar.png',
			'password' => Hash::make('666666'),
			'realname' =>'吴祖光',
			'email' => 'cyrilzhao@qq.com',
			'gender' =>2,
			'city' => '广东省',
			'identity' => '2',
			'role_id' => 1,
			'position' =>'戏剧大家',
			'interests' => '唱歌，跳舞，文学',
			'per_description' => '一九一七年四月出生于北京。父亲吴瀛是做官的，但以诗、文、书、画闻名，
						又是一位文物鉴赏家。家庭的文化氛围给少年吴祖光以一定的熏陶和影响。
						在中学读书时，他不仅初试文学习作，发表过一些诗歌和散文，
						而且被京剧艺术的特殊魅力所吸引，跑戏园，捧“戏子”，沉醉其中，
						不自觉地接受了戏剧艺术的启蒙教育。这对他后来的戏剧创作产生了深远的影响。
						中学毕业后入中法大学文学系，学习仅一年即应戏剧家余上沅之邀去南京国立戏剧.'

		]);

		User::create([
			'username' => 'alex',
			'avatar' => 'http://7xk6xh.com1.z0.glb.clouddn.com/avatar.png',
			'password' =>Hash::make('666666'),
			'realname' =>'刘天人',
			'email' => 'cyrilzhao@qq.com',
			'gender' =>2,
			'role_id' => 2,
			'city' => '山东省',
			'identity' => '4',
			'position' =>'戏剧大家',
			'interests' => '唱歌，跳舞，文学',
			'per_description' => '一九一七年四月出生于北京。父亲吴瀛是做官的，但以诗、文、书、画闻名，
						又是一位文物鉴赏家。家庭的文化氛围给少年吴祖光以一定的熏陶和影响。
						在中学读书时，他不仅初试文学习作，发表过一些诗歌和散文，
						而且被京剧艺术的特殊魅力所吸引，跑戏园，捧“戏子”，沉醉其中，
						不自觉地接受了戏剧艺术的启蒙教育。这对他后来的戏剧创作产生了深远的影响。
						中学毕业后入中法大学文学系，学习仅一年即应戏剧家余上沅之邀去南京国立戏剧.'
		]);

		User::create([
			'username' => 'alex',
			'avatar' => 'http://7xk6xh.com1.z0.glb.clouddn.com/avatar.png',
			'password' =>Hash::make('666666'),
			'realname' =>'大牛',
			'email' => 'cyrilzhao@qq.com',
			'gender' =>2,
			'city' => '大牛',
			'role_id' => 1,
			'identity' => '2',
			'position' =>'戏剧大家',
			'interests' => '唱歌，跳舞，文学',
			'per_description' => '一九一七年四月出生于北京。父亲吴瀛是做官的，但以诗、文、书、画闻名，
						又是一位文物鉴赏家。家庭的文化氛围给少年吴祖光以一定的熏陶和影响。
						在中学读书时，他不仅初试文学习作，发表过一些诗歌和散文，
						而且被京剧艺术的特殊魅力所吸引，跑戏园，捧“戏子”，沉醉其中，
						不自觉地接受了戏剧艺术的启蒙教育。这对他后来的戏剧创作产生了深远的影响。
						中学毕业后入中法大学文学系，学习仅一年即应戏剧家余上沅之邀去南京国立戏剧.'
		]);

		User::create([
			'username' => 'admin',
			'avatar' => 'http://7xk6xh.com1.z0.glb.clouddn.com/avatar.png',
			'password' =>Hash::make('666666'),
			'role_id' =>3,
			'email' => 'cyrilzhao@qq.com',
			'realname' =>'周星驰',
			'role_id' => 2,
			'gender' =>2,
			'city' => '重庆市',
			'identity' => '2',
			'position' =>'戏剧大家',
			'interests' => '唱歌，跳舞，文学',
			'per_description' => '一九一七年四月出生于北京。父亲吴瀛是做官的，但以诗、文、书、画闻名，
						又是一位文物鉴赏家。家庭的文化氛围给少年吴祖光以一定的熏陶和影响。
						在中学读书时，他不仅初试文学习作，发表过一些诗歌和散文，
						而且被京剧艺术的特殊魅力所吸引，跑戏园，捧“戏子”，沉醉其中，
						不自觉地接受了戏剧艺术的启蒙教育。这对他后来的戏剧创作产生了深远的影响。
						中学毕业后入中法大学文学系，学习仅一年即应戏剧家余上沅之邀去南京国立戏剧.'
		]);

	}

}