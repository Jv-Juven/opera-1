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
			$table->integer('year')->nullable();//出生年
			$table->integer('month')->nullable();//出生月
			$table->integer('day')->nullable();//出生日
			$table->string('hometown')->nullable();//籍贯
			$table->string('address')->nullable();//居住地址
			$table->string('guardian')->nullable();//监护人
			$table->string('phone')->nullable();//手机
			$table->string('unit')->nullable();//单位
			$table->string('position')->nullable();//职务
			$table->string('QQ')->nullable();//QQ
			$table->string('school')->nullable();//所在学校
			$table->string('postcode')->nullable();//邮编
			$table->string('trainingunit')->nullable();//京剧培训单位
			$table->string('profession')->nullable();//行当
			$table->string('timeoflearn')->nullable();//学习时间
			$table->text('details')->nullable();//详细说明

			$table->string('scorenumber')->nullable();//编号
			$table->string('score')->nullable();//分数
			$table->string('score_details')->nullable();//分数详情
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
