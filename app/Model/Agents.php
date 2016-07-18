<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Agents extends Model {
	
	protected $table = 'agents';


	//ambil data provinces secara keseluruhan
	public static function listAgents()
	{
		// group id 5, user customer tidak ditampilkan
		$list = DB::select( DB::raw("
			SELECT
			* 
			 
			FROM 
			agents 
			")
		);
		

		return $list;
	}

	public static function editAgents($id)
	{
		$list = DB::select( DB::raw(
				"SELECT 
					*
				    
				FROM 
					agents
				WHERE 
					agents.id = :id 
					"), 

			array(
				"id"	=> $id
			));
		return $list[0];                                       
	}


}
