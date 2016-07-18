<?php namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Model\User as User;
use App\Model\Product as Product;
use App\Model\Provinces as Provinces;
use App\Model\ProductCategory as ProductCategory;
use Input;
use Hash;
use Redirect;
use File;

class AdminProvincesController extends Controller {

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
		$provinces = Provinces::listProvinces();

		return view('backend.provinces.index')
			->with('tab1', 'Product')
			->with('title', 'Products')
			->with('titleDescription', 'Manage Products')
			->with('provinces', $provinces);
	}

	public function create()
	{
		return view('backend.provinces.create')
			->with('tab1', 'Provinces')
			->with('tab2', 'Create')
			->with('title', 'Provinces')
			->with('titleDescription', 'Create');
	}

	public function store()
	{
		
		//menyimpan data yang di create dengan variabel baru
		$prov = new Provinces;

		$prov->name = Input::get('name');
	
		
		

		$prov->save();

		
		// sukses menyimpan redirect kemana
		return Redirect::to('admin/provinces')
			->with('message', 'user has been added');
	}

	public function edit($id)
	{
		//ngambil satu parameter dengan id yang terselek
		$provinces = Provinces::editProvinces($id);

		return view('backend.provinces.edit')
			->with('tab1', 'provinces')
			->with('title', 'provinces')
			->with('titleDescription', 'Edit')
			->with('provinces', $provinces);
	}

	public function update($id)
	{	
		//untuk mencari id yang telah di update
		$provinces = Provinces::find($id);
		
		//dapatkan data nama provinsi
		$provinces->name = Input::get('name');
		
		//untuk menyimpan
		$provinces->save();

		

		return Redirect::to('admin/provinces')
			->with('message', 'user has been updated!');
	}

	public function delete($id)
	{
		Provinces::destroy($id);
		return Redirect::to('admin/provinces')
			->with('message', 'user has been deleted!');
	}


}
