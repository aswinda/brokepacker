<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {
	
	protected $table = 'groups';

	const ADMIN = 1;
	const CUSTOMER = 2;



}
