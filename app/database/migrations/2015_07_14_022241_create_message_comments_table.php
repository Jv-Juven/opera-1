<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('message_comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('user_id');
			$table->integer('message_id')->unsigned()->index('message_id');
			$table->text('content');
			$table->timestamps();

			$table                          
				->foreign('user_id')
				->references('id')->on('users') 
				->onDelete('cascade')
				->onUpdate('cascade');

			$table                          
				->foreign('message_id')
				->references('id')->on('messages') 
				->onDelete('cascade')
				->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('message_comments');
	}

}