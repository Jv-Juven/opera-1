<?php

class ContactUs extends Eloquent{
	 
	protected $table = 'contacts';
	
	protected $fillable = array(
		'number',
		'people',
		'postcode',
		'address',
		'site'
		);
}