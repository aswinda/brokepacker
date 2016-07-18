<?php namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use DB;
class Provinces extends Model {
	
	protected $table = 'provinces';


	//ambil data provinces secara keseluruhan
	public static function listProvinces()
	{
		// group id 5, user customer tidak ditampilkan
		$list = DB::select( DB::raw("
			SELECT * FROM `provinces`")
		);
		

		return $list;
	}


	//ambil data yang terseleksi

	public static function editProvinces($id)
	{
		$list = DB::select( DB::raw(
				"SELECT 
					provinces.id,
					provinces.name
				    
				FROM 
					provinces
				WHERE 
					provinces.id = :id 
					"), 

			array(
				"id"	=> $id
			));

		return $list[0];
	}
}
