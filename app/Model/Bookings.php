<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;


class Bookings extends Model {
	
	protected $table = 'bookings';

//ambil data provinces secara keseluruhan
	public static function listBookings()
	{
		// group id 5, user customer tidak ditampilkan
		$list = DB::select( DB::raw(
		   "SELECT
				bookings.id, 
				profiles.name as name, 
				packages.name as packages,
				
				bookings.date,
				bookings.price

			FROM 
				bookings,
				profiles,
				users,
				packages

			WHERE
			users.group_id = 2 AND
			bookings.customer_id = users.id AND 
			users.profile_id = profiles.id  AND
			bookings.package_id = packages.id")
		);
		

		return $list;
	}

	public static function detailBookings($id)
	{
			
			
		$list = DB::select( DB::raw(
		   "SELECT
				bookings.id,
				profiles.name as name, 
				packages.name as packages,
				packages.description as description,
				inns.name as hotel,
                agents.name as agent,
               	a.name as asal, 
				b.name as tujuan,
				bookings.date,
				bookings.price,
				users.group_id

			FROM 
				bookings,
				profiles,
				users,
				inns,
                agents,
                agents_routes,
                districts as a,
				districts as b,
				packages
				
            WHERE
           
            users.group_id = 2 AND
            bookings.customer_id = users.id AND 
			users.profile_id = profiles.id AND
			bookings.package_id = packages.id AND
			packages.inn_id = inns.id AND
            packages.agent_id = agents.id AND
            a.id = agents_routes.asal AND 
			b.id = agents_routes.tujuan AND
            agents_routes.agent_id = agents.id AND
            bookings.id = :id
			
					"), 

			array(
				"id"	=> $id
			));

		return $list[0];
	}

	public static function listBookingsUser($user_id)
	{
			
			
		$list = DB::select( DB::raw(
		   "SELECT
				bookings.id,
				profiles.name as name, 
				packages.name as packages,
				bookings.package_id,
				packages.description as description,
				inns.name as hotel,
                agents.name as agent,
               	a.name as asal, 
				b.name as tujuan,
				bookings.date,
				bookings.price,
				users.group_id,
				packages.photo

			FROM 
				bookings,
				profiles,
				users,
				inns,
                agents,
                agents_routes,
                districts as a,
				districts as b,
				packages
				
            WHERE
           
            users.group_id = 2 AND
            bookings.customer_id = users.id AND 
			users.profile_id = profiles.id AND
			bookings.package_id = packages.id AND
			packages.inn_id = inns.id AND
            packages.agent_id = agents.id AND
            a.id = agents_routes.asal AND 
			b.id = agents_routes.tujuan AND
            agents_routes.agent_id = agents.id AND
            users.id = :id
			
					"), 

			array(
				"id"	=> $user_id
			));

		return $list;
	}

}
