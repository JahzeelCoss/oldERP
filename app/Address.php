<?php namespace App;



class Address extends Elegant 
{
	protected $table = 'Addresses';

	public static $rules = [
        'street'=> 'required|alphanumeric',
        'number'=> 'required|alphanumeric',
        'inner_number' => 'alphanumeric',
        'postal_code' => 'required|numeric|size:5',
        'colony'=> 'required|alphanumeric',
        'city'=> 'required|alphanumeric',
        'estate' => 'required|alphanumeric',
        'additional_info' => 'required|alphanumeric'

    ];


}