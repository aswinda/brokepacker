<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Agents_routes extends Model {
	
	protected $table = 'agents_routes';

	//ambil data provinces secara keseluruhan
	public static function listAgents_routes()
	{
		// group id 5, user customer tidak ditampilkan
		$list = DB::select( DB::raw(
		   "SELECT
				agents_routes.id, 
				a.name as asal, 
				b.name as tujuan,
				agents.name as agents,
				price

			FROM 
				agents_routes,
				districts as a,
				districts as b,
				agents

			WHERE
			a.id = agents_routes.asal AND 
			b.id = agents_routes.tujuan AND
			agents_routes.agent_id = agents.id
			")
		);
		

		return $list;
	}
	//ambil data yang terseleksi

	public static function editAgents_routes($id)
	{
		$list = DB::select( DB::raw(
				"SELECT 
					agents_routes.id, 
					a.id as asal, 
					b.id as tujuan,
					agents.name as agents,
					price
                   
				    
				FROM 
					agents_routes,
					districts as a,
					districts as b,
					agents
                WHERE
                	a.id = agents_routes.asal AND 
					b.id = agents_routes.tujuan AND
					agents_routes.agent_id = agents.id AND
                
                	agents_routes.id = :id 
					"), 

			array(
				"id"	=> $id
			));

		return $list[0];                                       
	}


}
