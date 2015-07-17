<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{			//戏剧家
		Schema::create('teachers', function(Blueprint $table)
		{
			$table->increments('id');
			//照片
			$table->string('avatar')->default('http://7xk6xh.com1.z0.glb.clouddn.com/lucy.jpg');
			$table->string('chinese_name');//中文名
			$table->string('foreign_name');//外文名
			$table->string('country');//国籍
			$table->string('nation');//民族
			$table->string('birthplace');//出生地
							
			$table->string('position');//职业
			$table->string('social_post');//社会公职
			$table->string('production');//代表作品
			$table->string('per_description');//简介
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
		Schema::drop('teachers');
	}

}
