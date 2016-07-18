<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Places extends Model {
	
	protected $table = 'places';

	public static function listPlaces()
	{
		// group id 5, user customer tidak ditampilkan
		$list = DB::select( DB::raw(
			"SELECT 
					places.id,
					places.name AS place,
					locations.name AS location,
					places.description
					
				FROM
					places,
					locations
				
				WHERE
					places.location_id = locations.id  ")
		);
		

		return $list;
	}

	public static function editPlaces($id)
	{
		$list = DB::select( DB::raw(
				"SELECT 
					places.id,
					locations.district_id,
					places.name AS place,
					locations.name AS location,
					places.description
                   
				    
				FROM 
					places,
					locations
                WHERE 
                places.id = :id AND
                places.location_id = locations.id 
					"), 

			array(
				"id"	=> $id
			));

		return $list[0];                                       
	}
	public static function detailDestinationsWithImage($id)
	{
		$list = DB::select( DB::raw(
				"SELECT 
					places.id,
					locations.district_id,
					places.name AS place,
					locations.name AS location,
					places.description,
				    photo
				FROM 
					places,
					locations
				WHERE 
					places.id = :id AND
                	places.location_id = locations.id 
					"), 

			array(
				"id"	=> $id
			));

		return $list[0];
	}

}
