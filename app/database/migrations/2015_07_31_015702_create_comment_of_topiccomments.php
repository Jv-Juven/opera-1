<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentOfTopiccomments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comment_of_topiccomments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sender_id')->unsigned()->index('sender_id');		// 发表回复的用户
			$table->integer('topiccomment_id')->unsigned()->index('topiccomment_id');	// 该回复所在的评论
			$table->integer('receiver_id')->unsigned()->index('receiver_id');	// 被回复的用户
			$table->integer('topic_id')->unsigned()->index('topic_id');//话题id
			$table->string('content');	// 评论内容
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
				->foreign('topic_id')
				->references('id')->on('topics') 
				->onDelete('cascade')
				->onUpdate('cascade');

			$table                          
				->foreign('topiccomment_id')
				->references('id')->on('topic_comments') 
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
		Schema::drop('comment_of_topiccomments');
	}

}
