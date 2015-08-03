<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username')->unique();//用户名
			$table->string('email');//邮箱
			$table->string('password');//密码

			$table->string('avatar')->default("http://7xk6xh.com1.z0.glb.clouddn.com/lucy.jpg");//头像
			$table->string('realname')->nullable();//真实姓名
			$table->boolean('gender')->default(2);  // 0=male 1=female 2=unknown
			$table->string('city')->nullable();//所在城市
			$table->string('identity');//转换成integer，用于认证老师的查询
			$table->string('position')->nullable();//职位
			$table->string('interests')->nullable();//兴趣
			$table->text('per_description')->nullable();//个人简介
			$table->string('remember_token')->nullable();
			$table->integer('role_id')->nullable(); //用户类型 1=student, 0=teacher, 3=administer 
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
