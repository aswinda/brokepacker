<?php namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Model\User as User;
use App\Model\Product as Product;
use App\Model\Provinces as Provinces;
use App\Model\Districts as Districts;
use App\Model\Packages as Packages;
use App\Model\Places as Places;
use App\Model\Inns as Inns;
use App\Model\Agents as Agents;
use App\Model\ProductCategory as ProductCategory;
use Input;
use Hash;
use Redirect;
use File;

class AdminPackagesController extends Controller {

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
		$packages = Packages::listPackages();

		return view('backend.packages.index')
			->with('tab1', 'Packages')
			->with('title', 'Packages')
			->with('titleDescription', 'Manage Packages')
			->with('packages', $packages);
	}

	public function create()
	{
		$packages = Packages::all();
		$locations = Places::all();
		$inns = Inns::all();
		$agents = Agents::all();

		return view('backend.packages.create')
			->with('tab1', 'Packages')
			->with('tab2', 'Packages')
			->with('title', 'Packages')
			->with('titleDescription', 'Create')
			->with('packages', $packages)
			->with('inns', $inns)
			->with('locations', $locations)
			->with('agents', $agents);
	}

	public function store()
	{
		
		//menyimpan data yang di create dengan variabel baru
		$packages = new Packages;
		$packages->name = Input::get('name');
		$packages->description = Input::get('description');
		$packages->place_id = Input::get('place_id');
		$packages->inn_id = Input::get('inn_id');
		$packages->agent_id = Input::get('agent_id');
		$packages->price = Input::get('price');

		// Store Image
		if (Input::file('file') != NULL)
		{
			if(Input::file('file')->getClientMimeType() != 'image/jpeg' &&
			Input::file('file')->getClientMimeType() != 'image/jpg' &&
			Input::file('file')->getClientMimeType() != 'image/png'  &&
			Input::file('file')->getClientMimeType() != 'image/bmp')
			{
				return Redirect::back()
					->with('errors', 'File Harus gambar dan bertipe jpeg, jpg, png');
			}

			
			$file = Input::file('file');
			$name = strtotime("now");
			$extension = str_replace("image/", "", $file->getClientMimeType());
			$packages->photo = $name.'.'.$extension;
			
			Input::file('file')->move(public_path().'/images/profiles',$packages->photo);
		}

		$packages->save();

		
		// sukses menyimpan redirect kemana
		return Redirect::to('admin/packages')
			->with('message', 'packages has been added');
	}

	public function edit($id)
	{
	
		//ngambil satu parameter dengan id yang terselek
		$packages = Packages::editPackages($id);

		return view('backend.packages.edit')
			->with('tab1', 'packages')
			->with('title', 'packages')
			->with('titleDescription', 'Edit')
			->with('packages', $packages)
			->with('packages', $packages);
	}

	public function update($id)
	{	

		$packages = Packages::find($id);
		
		//dapatkan data nama kota
		$packages->name = Input::get('name');
		$packages->save();

		

		return Redirect::to('admin/packages')
			->with('message', 'packages has been updated!');
	}

	public function delete($id)
	{
		Packages::destroy($id);
		return Redirect::to('admin/packages')
			->with('message', 'Packages has been deleted!');
	}

	

}
