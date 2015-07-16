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
			$table->string('username');
			$table->string('email');
			$table->string('password');

			$table->string('avatar')->default("http://7xk6xh.com1.z0.glb.clouddn.com/lucy.jpg");
			$table->string('realname');
			$table->boolean('gender')->default(2);  // 0=male 1=female 2=unknown
			$table->string('city');
			$table->string('identity');//转换成integer
			$table->string('position');
			$table->string('interests');
			$table->text('per_description');

			$table->integer('role_id'); //1=student, 2=teacher, 3= administer 
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
