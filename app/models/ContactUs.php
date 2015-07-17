<?php

class ContactUs extends Eloquent{
	 
	$table = 'contacts';
	
	$fillable = array(
		'number',
		'people',
		'postcode',
		'address',
		'site'
		);
}