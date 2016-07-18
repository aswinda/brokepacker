<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Packages extends Model {
	
	protected $table = 'packages';

//ambil data provinces secara keseluruhan
	public static function listPackages()
	{
		// group id 5, user customer tidak ditampilkan
		$list = DB::select( DB::raw("
			SELECT * FROM `packages`")
		);
		

		return $list;
	}


	//ambil data yang terseleksi

	public static function editPackages($id)
	{
		$list = DB::select( DB::raw(
				"SELECT 
					packages.id,
					packages.name
				    
				FROM 
					packages
				WHERE 
					packages.id = :id 
					"), 

			array(
				"id"	=> $id
			));

		return $list[0];
	}

	public static function findPackages($from, $dest)
	{
		$string = "
			SELECT 
				packages.id,
				packages.name,
				a.name,
				b.name,
				photo,
				packages.price
			FROM 
				packages,
				agents,
				agents_routes,
				districts AS a,
				districts AS b
			WHERE
				a.name LIKE '%".$from."%' AND
				b.name LIKE '%".$dest."%' AND
				agents_routes.asal = a.id AND
				agents_routes.tujuan = b.id AND
				packages.agent_id = agents.id AND
				agents_routes.agent_id = agents.id";
		
		$list = DB::select( DB::raw($string));
		

		return $list;
	}

	public static function detailPackages($id)
	{
		$string = "
			SELECT 
				packages.id,
				packages.photo,
				districts.name AS district_name,
				provinces.name AS province_name,
				packages.price,
				inns.name AS inn_name,
				agents.name AS agent_name,
				agents.type AS agent_type,
				packages.name,
				packages.description
			FROM 
				packages,
				districts,
				provinces,
				inns,
				agents,
				places,
				locations
			WHERE
				packages.id =".$id." AND
				packages.place_id = places.id AND
				places.location_id = locations.id AND
				locations.district_id = districts.id AND
				districts.province_id = provinces.id AND
				packages.inn_id = inns.id AND
				packages.agent_id = agents.id";
		
		$list = DB::select( DB::raw($string));
		

		return $list[0];
	}

}
