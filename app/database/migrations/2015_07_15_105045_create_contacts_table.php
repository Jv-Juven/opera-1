<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{			//联系我们
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('number');//电话
			$table->string('people');//联系人
			$table->string('postcode');//邮编
			$table->string('address');//地址
			$table->string('site');//网址
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
		Schema::drop('contacts');
	}

}
