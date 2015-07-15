<?php 

class Teacher extends Eloquent{

	protected $table = 'teachers';

	protected $fillable = array(
			'id',
			'avatar',
			'chinese_name',
			'foreign_name',
			'country',
			'nation',
			'birthplace',
			'position',
			'social_post',
			'production',
			'per_description',
			'created_at'
		);
}