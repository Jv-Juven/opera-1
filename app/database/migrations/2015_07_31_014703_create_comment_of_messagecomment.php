<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentOfMessagecomment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comment_of_msgcomment', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sender_id')->unsigned()->index('sender_id');
			$table->integer('messagecomment_id')->unsigned()->index('messagecomment_id');
			$table->integer('receiver_id')->unsigned()->index('receiver_id');
			$table->string('content');
			$table->timestamps();

			$table                          
				->foreign('sender_id')
				->references('id')->on('users') 
				->onDelete('cascade')
				->onUpdate('cascade');

			$table                          
				->foreign('receiver_id')
				->references('id')->on('users') 
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
		Schema::drop('comment_of_msgcomment');
	}

}
