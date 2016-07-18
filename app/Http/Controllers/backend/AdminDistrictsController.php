<?php namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Model\User as User;
use App\Model\Product as Product;
use App\Model\Provinces as Provinces;
use App\Model\Districts as Districts;
use App\Model\ProductCategory as ProductCategory;
use Input;
use Hash;
use Redirect;
use File;

class AdminDistrictsController extends Controller {

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
		$districts = Districts::listDistricts();

		return view('backend.districts.index')
			->with('tab1', 'Districts')
			->with('title', 'Districts')
			->with('titleDescription', 'Manage Products')
			->with('districts', $districts);
	}

	public function create()
	{
		$provinces = Provinces::all();

		return view('backend.districts.create')
			->with('tab1', 'Districts')
			->with('tab2', 'Districts')
			->with('title', 'Districts')
			->with('titleDescription', 'Create')
			->with('provinces', $provinces);
	}

	public function store()
	{
		
		//menyimpan data yang di create dengan variabel baru
		$kota = new Districts;

		$kota->province_id = Input::get('provinces');
		$kota->name = Input::get('name');

	
		
		

		$kota->save();

		
		// sukses menyimpan redirect kemana
		return Redirect::to('admin/districts')
			->with('message', 'user has been added');
	}

	public function edit($id)
	{
		//ngambil data provinsi
		$provinces = Provinces::all();
		//ngambil satu parameter dengan id yang terselek
		$districts = Districts::editDistricts($id);

		return view('backend.districts.edit')
			->with('tab1', 'provinces')
			->with('title', 'provinces')
			->with('titleDescription', 'Edit')
			->with('districts', $districts)
			->with('provinces', $provinces);
	}

	public function update($id)
	{	

		$provinces = Provinces::all();
		//untuk mencari id yang telah di update
		$districts = Districts::find($id);
		
		//dapatkan data nama kota
		$districts->name = Input::get('name');
		

		$districts->province_id = Input::get('provinces');
		//untuk menyimpan
		$districts->save();

		

		return Redirect::to('admin/districts')
			->with('message', 'user has been updated!');
	}

	public function delete($id)
	{
		Districts::destroy($id);
		return Redirect::to('admin/districts')
			->with('message', 'user has been deleted!');
	}

	

}
