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
	{			//申请表
		Schema::create('applications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');//用户id
			$table->string('name');//姓名
			$table->integer('gender')->default(2);// 0=male 1=female 2=unknown
			$table->integer('year');//出生年
			$table->integer('month');//出生月
			$table->integer('day');//出生日
			$table->string('hometown');//籍贯
			$table->string('address');//居住地址
			$table->string('guardian');//监护人
			$table->string('phone');//手机
			$table->string('unit');//单位
			$table->string('position');//职务
			$table->string('QQ');//QQ
			$table->string('school');//所在学校
			$table->string('postcode');//邮编
			$table->string('trainingunit');//京剧培训单位
			$table->string('profession');//行当
			$table->string('timeoflearn');//学习时间
			$table->text('details');//详细说明

			$table->string('scorenumber');//编号
			$table->string('score');//分数
			$table->string('score_details');//分数详情
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
		Schema::drop('applications');
	}

}
