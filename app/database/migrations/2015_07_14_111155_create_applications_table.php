<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('applications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('name');
			$table->integer('gender')->default(2);// 0=male 1=female 2=unknown
			$table->integer('year');
			$table->integer('month');
			$table->integer('day');
			$table->string('hometown');
			$table->string('address');
			$table->string('guardian');
			$table->string('phone');
			$table->string('unit');
			$table->string('position');
			$table->string('QQ');
			$table->string('school');
			$table->string('postcode');
			$table->string('trainingunit');
			$table->string('profession');
			$table->string('timeoflearn');
			$table->text('details');

			$table->string('scorenumber');
			$table->string('score');
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
		Schema::drop('applicatios');
	}

}
