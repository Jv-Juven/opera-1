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
	{
		Schema::create('teachers', function(Blueprint $table)
		{
			$table->increments('id');
			//
			$table->string('avatar')->default('http://7xk6xh.com1.z0.glb.clouddn.com/lucy.jpg');
			//
			$table->string('chinese_name');
			$table->string('foreign_name');
			$table->string('country');
			$table->string('nation');
			$table->string('birthplace');
			//
			$table->string('position');
			$table->string('social_post');
			$table->string('production');
			$table->string('per_description');
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
