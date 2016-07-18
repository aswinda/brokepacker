<?php namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Model\User as User;
use App\Model\Product as Product;
use App\Model\Provinces as Provinces;
use App\Model\Districts as Districts;
use App\Model\Agents_routes as Agents_routes;
use App\Model\Agents as Agents;
use App\Model\Bookings as Bookings;
use App\Model\ProductCategory as ProductCategory;
use Input;
use Hash;
use Redirect;
use File;

class AdminBookingsController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bookings = Bookings::listBookings();

		return view('backend.bookings.index')
			->with('tab1', 'Bookings')
			->with('title', 'Bookings')
			->with('titleDescription', 'Manage Bookings')
			->with('bookings', $bookings);
	}

	public function customer()
	{
		$bookings = Bookings::listBookings();

		return view('backend.bookings.customer')
			->with('tab1', 'Bookings')
			->with('title', 'Bookings')
			->with('titleDescription', 'Manage Bookings')
			->with('bookings', $bookings);
	}
	public function createpackages()
	{
		$users = Users::all();
		$packages = Packages::all();
		$bookings = Bookings::all();
		$agents_routes = Agent_routes::all();

		return view('backend.bookings.createpackages')
			->with('tab1', 'Bookings')
			->with('tab2', 'Bookings')
			->with('title', 'Bookings')
			->with('titleDescription', 'Create')
			->with('users', $users)
			->with('packages', $packages)
			->with('bookings', $bookings);
	}

	public function createuserpackages()
	{
		$users = User::all();
		$agents_routes = Agent_routes::all();
		$packages = Packages::all();
		$bookings = Bookings::all();

		return view('backend.bookings.createuserpackages')
			->with('tab1', 'Bookings')
			->with('tab2', 'Bookings')
			->with('title', 'Bookings')
			->with('titleDescription', 'Create')
			->with('users', $users)
			->with('packages', $packages)
			->with('bookings', $bookings);
	}

	public function storepackages()
	{
		
		//menyimpan data yang di create dengan variabel baru
		$route = new Agents_routes;

		$route->asal = Input::get('asal');
		$route->tujuan = Input::get('tujuan');
		$route->agent_id = Input::get('agents');
		$route->price = Input::get('price');

		$route->save();

		
		// sukses menyimpan redirect kemana
		return Redirect::to('admin/agents_routes')
			->with('message', 'Route has been added');
	}



	public function storeuserpackages()
	{
		
		//menyimpan data yang di create dengan variabel baru
		$route = new Agents_routes;

		$route->asal = Input::get('asal');
		$route->tujuan = Input::get('tujuan');
		$route->agent_id = Input::get('agents');
		$route->price = Input::get('price');

		$route->save();

		
		// sukses menyimpan redirect kemana
		return Redirect::to('admin/agents_routes')
			->with('message', 'Route has been added');
	}

	

	public function edit($id)
	{
		//ngambil data agents dan districts
		$agents = Agents::all();
		$districts = Districts::all();
		//ngambil satu parameter dengan id yang terselek
		$agents_routes = Agents_routes::editAgents_routes($id);

		return view('backend.agents_routes.edit')
			->with('tab1', 'Routes')
			->with('title', 'Routes')
			->with('titleDescription', 'Edit')
			->with('districts', $districts)
			->with('agents', $agents)
			->with('agents_routes', $agents_routes);
	}

	public function update($id)
	{	

		$agents = Agents::all();
		$districts = Districts::all();
		//untuk mencari id yang telah di update
		$agents_routes =  Agents_routes::find($id);
		
	
		$agents_routes->asal = Input::get('asal');
		$agents_routes->tujuan = Input::get('tujuan');
		$agents_routes->agent_id = Input::get('agents');
		$agents_routes->price = Input::get('price');
		

		
		//untuk menyimpan
		$agents_routes->save();

		

		return Redirect::to('admin/agents_routes')
			->with('message', 'Routes has been updated!');
	}

	public function delete($id)
	{
		Agents_routes::destroy($id);
		return Redirect::to('admin/agents_routes')
			->with('message', 'Routes has been deleted!');
	}


	public function show($id)
	{
		$bookings = Bookings::detailBookings($id);

		return view('backend.bookings.show')
			->with('tab1', 'Bookings')
			->with('title', 'Bookings')
			->with('titleDescription', 'show')
			->with('bookings', $bookings);
	}

	

}
