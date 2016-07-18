<?php namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Model\User as User;
use App\Model\Product as Product;
use App\Model\Provinces as Provinces;
use App\Model\Districts as Districts;
use App\Model\Agents as Agents;
use App\Model\ProductCategory as ProductCategory;
use Input;
use Hash;
use Redirect;
use File;

class AdminAgentsController extends Controller {

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
		
		// untuk mengambil semua tabel
		$agents = Agents::all();

		return view('backend.agents.index')
			->with('tab1', 'Agents')
			->with('title', 'Agents')
			->with('titleDescription', 'Manage Products')
			->with('agents', $agents);
	}

	public function create()
	{
		$agents = Agents::all();

		return view('backend.agents.create')
			->with('tab1', 'Agents')
			->with('tab2', 'Agents')
			->with('title', 'Agents')
			->with('titleDescription', 'Create')
			->with('agents', $agents);
	}

	public function store()
	{
		
		//menyimpan data yang di create dengan variabel baru
		$agent = new Agents;

		$agent->name = Input::get('name');
		$agent->description = Input::get('description');

		$agent->save();

		
		// sukses menyimpan redirect kemana
		return Redirect::to('admin/agents')
			->with('message', 'agent has been added');
	}

	public function edit($id)
	{
		//ngambil data provinsi
		$agents = Agents::all();
		//ngambil satu parameter dengan id yang terselek
		$agents = Agents::editAgents($id);

		return view('backend.agents.edit')
			->with('tab1', 'agents')
			->with('title', 'agents')
			->with('titleDescription', 'Edit')
			->with('agents', $agents);
			
	}

	public function update($id)
	{	

		
		//untuk mencari id yang telah di update
		$agents = Agents::find($id);
		
		//update nama dan deskripsi
		$agents->name = Input::get('name');

		$agents->description = Input::get('description');

		//untuk menyimpan
		$agents->save();

		

		return Redirect::to('admin/agents')
			->with('message', 'Agent has been updated!');
	}

	public function delete($id)
	{
		Agents::destroy($id);
		return Redirect::to('admin/agents')
			->with('message', 'Agent has been deleted!');
	}

	

}
