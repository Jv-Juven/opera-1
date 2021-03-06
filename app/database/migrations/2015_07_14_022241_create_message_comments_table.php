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
	{				//留言的回复
		Schema::create('message_comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sender_id')->unsigned()->index('sender_id');//被回复者id
			$table->integer('receiver_id')->unsigned()->index('receiver_id');//回复者id
			$table->integer('message_id')->unsigned()->index('message_id');//被回复的留言的id
			$table->text('content');//内容
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
