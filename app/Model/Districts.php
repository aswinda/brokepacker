<?php namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use DB;
class Districts extends Model {
	
	protected $table = 'districts';


	//ambil data provinces secara keseluruhan
	public static function listDistricts()
	{
		// group id 5, user customer tidak ditampilkan
		$list = DB::select( DB::raw("
			SELECT
			districts.id, 
			districts.name as kota, 
			provinces.name as provinsi 
			FROM districts, provinces 
			WHERE
			districts.province_id = provinces.id")
		);
		

		return $list;
	}


	//ambil data yang terseleksi

	public static function editDistricts($id)
	{
		$list = DB::select( DB::raw(
				"SELECT 
					districts.id,
                    districts.province_id,
					districts.name as kota,
                    provinces.name as provinsi
                   
				    
				FROM 
					districts, provinces
                WHERE
                districts.province_id = provinces.id AND
                districts.id = :id 
					"), 

			array(
				"id"	=> $id
			));

		return $list[0];                                       
	}
}
