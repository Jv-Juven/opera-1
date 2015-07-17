<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{			//留言
		Schema::create('messages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('receiver_id')->unsigned()->index('receiver_id');//被留言者id
			$table->integer('sender_id')->unsigned()->index('sender_id');//留言者id
			$table->text('content');//留言内容
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
		Schema::drop('messages');
	}

}
