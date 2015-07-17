<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppreciationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{				//经典欣赏
		Schema::create('appreciations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');//标题
			$table->string('video');//视频连接
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
		Schema::drop('appreciations');
	}

}
