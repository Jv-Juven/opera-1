<?php 

class SocietyDynamics extends Eloquent{

	protected $table = 'society_dynamics';//学会动态

	protected $fillable = array(
		'id',
		'title',
		'content',
		'created_at'
	);
}