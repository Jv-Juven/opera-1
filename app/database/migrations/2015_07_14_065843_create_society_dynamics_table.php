<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocietyDynamicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{				//协会动态
		Schema::create('society_dynamics', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');//题目
			$table->longtext('content');//内容
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
		Schema::drop('society_dynamics');
	}

}
