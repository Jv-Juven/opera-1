<?php

class AssociationDynamics extends Eloquent{

	protected $table = 'association_dynamics';//协会动态

	protected $fillable = array(
		'id',
		'title',
		'content',
		'created_at'
	);
}