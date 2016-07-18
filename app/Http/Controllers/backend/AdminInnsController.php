<?php namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Model\User as User;
use App\Model\Product as Product;
use App\Model\Provinces as Provinces;
use App\Model\Districts as Districts;
use App\Model\Agents_routes as Agents_routes;
use App\Model\Agents as Agents;
use App\Model\Inns as Inns;
use App\Model\ProductCategory as ProductCategory;
use Input;
use Hash;
use Redirect;
use File;

class AdminInnsController extends Controller {

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
		$inns = Inns::listInns();

		return view('backend.inns.index')
			->with('tab1', 'Inns')
			->with('title', 'Inns')
			->with('titleDescription', 'Manage Routes')
			->with('inns', $inns);
	}

	public function create()
	{
		$inns = Inns::all();
		$districts = Districts::all();
		

		return view('backend.inns.create')
			->with('tab1', 'Inns')
			->with('tab2', 'Inns')
			->with('title', 'Inns')
			->with('titleDescription', 'Create')
			->with('inns', $inns)
			->with('districts', $districts);
	}

	public function store()
	{
		
		//menyimpan data yang di create dengan variabel baru
		$inn = new Inns;

		$inn->name = Input::get('name');
		$inn->address = Input::get('address');
		$inn->district_id = Input::get('district');
		$inn->price = Input::get('price');

		$inn->save();

		
		// sukses menyimpan redirect kemana
		return Redirect::to('admin/inns')
			->with('message', 'Inns has been added');
	}

	public function edit($id)
	{
		//ngambil data agents dan districts
		
		$districts = Districts::all();
		//ngambil satu parameter dengan id yang terselek
		$inns = Inns::editInns($id);
			return view('backend.inns.edit')
			->with('tab1', 'Inns')
			->with('title', 'Inns')
			->with('titleDescription', 'Edit')
			->with('inns', $inns)
			->with('districts', $districts);
	}

	public function update($id)
	{	

		
		$districts = Districts::all();
		//untuk mencari id yang telah di update
		$inns =  Inns::find($id);
		
	
		$inns->name = Input::get('name');
		$inns->address = Input::get('address');
		$inns->district_id = Input::get('district');
		$inns->price = Input::get('price');
		

		
		//untuk menyimpan
		$inns->save();

		

		return Redirect::to('admin/inns')
			->with('message', 'Inns has been updated!');
	}

	public function delete($id)
	{
		Inns::destroy($id);
		return Redirect::to('admin/inns')
			->with('message', 'Routes has been deleted!');
	}

	

}
