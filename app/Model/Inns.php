<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Inns extends Model {
	
	protected $table = 'inns';

	//ambil data provinces secara keseluruhan
	public static function listInns()
	{
		// group id 5, user customer tidak ditampilkan
		$list = DB::select( DB::raw(
		   "SELECT
				inns.id, 
				inns.name,
				inns.address,
				districts.name as district,
				price

			FROM 
				inns,
				districts

			WHERE
			
			inns.district_id = districts.id
			")
		);
		

		return $list;
	}
	//ambil data yang terseleksi

	public static function editInns($id)
	{
		$list = DB::select( DB::raw(
				"SELECT
				inns.id, 
				inns.name,
				inns.address,
				districts.name as district,
				price

			FROM 
				inns,
				districts

			WHERE
			 		inns.id = :id
				 
				 AND
				inns.district_id = districts.id
					"), 

			array(
				"id"	=> $id
			));

		return $list[0];                                       
	}


}
