<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnlightenColumnTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{				//启蒙专栏
		Schema::create('enlighten_columns', function(Blueprint $table)
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
		Schema::drop('enlighten_columns');
	}

}
