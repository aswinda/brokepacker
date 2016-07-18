<?php namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Model\User as User;
use App\Model\Profile as Profile;
use App\Model\Places as Places;
use App\Model\Districts as Districts;
use App\Model\Provinces as Provinces;
use App\Model\Locations as Locations;
use Input;
use Hash;
use Redirect;
use File;

class AdminDestinationsController extends Controller {

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
		$places = Places::listPlaces();

		return view('backend.destinations.index')
			->with('tab1', 'Places')
			->with('title', 'Places')
			->with('titleDescription', 'Manage Users')
			->with('places', $places);
	}

	public function create()
	{
		
		$districts = Districts::all();
		$provinces = Provinces::all();
		return view('backend.destinations.create')
			->with('tab1', 'Places')
			->with('tab2', 'Places')
			->with('title', 'Places')
			->with('districts', $districts)
			->with('provinces', $provinces);

			
	}

	public function store()
	{
		
		
		// yang kiri database dan yang kanan input pada view
		$places = new Places;
		$places->name = Input::get('place');
		$places->description = Input::get('description');
		$locations = new Locations;
		$locations->name = Input::get('location');
		
		$locations->district_id = Input::get('districts');
		
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
			$places->photo = $name.'.'.$extension;
			
			Input::file('file')->move(public_path().'/images/profiles',$places->photo);
		}
		$locations->save();
		$places->location_id=$locations->id;
		$places->save();
		

		

		return Redirect::to('admin/destinations')
			->with('message', 'Destination has been added');
	}

	public function edit($id)
	{
		
		$districts = Districts::all();
		$provinces = Provinces::all();

		$places = Places::editPlaces($id);

		return view('backend.destinations.edit')
			->with('tab1', 'Places')
			->with('tab2', 'Places')
			->with('title', 'Places')
			->with('places', $places)
			->with('districts', $districts)
			->with('provinces', $provinces);
	}

	public function update($id)
	{
		// yang kiri database dan yang kanan input pada view

			//untuk mencari id yang telah di update
	
		$places =  Places::find($id);
		$places->name = Input::get('place');
		$places->description = Input::get('description');
		
		$locations = Locations::find($id);
		$locations->name = Input::get('location');
		
		$locations->district_id = Input::get('location');
		
		// Store Image
		if (Input::file('file') != NULL)
		{
			File::delete(public_path().'/images/users/'.$profile->photo);

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
			$profile->photo = $name.'.'.$extension;
			Input::file('file')->move(public_path().'/images/profiles',$profile->photo);
		}

		$places->save();
		$locations->save();


		return Redirect::to('admin/destinations')
			->with('message', 'Destination has been updated!');
	}

	public function delete($id)
	{
		Places::destroy($id);
		return Redirect::to('admin/destinations')
			->with('message', 'Destination has been deleted!');
	}

	public function show($id)
	{
		$places = Places::detailDestinationsWithImage($id);

		return view('backend.destinations.show')
			->with('tab1', 'places')
			->with('title', 'places')
			->with('titleDescription', 'show')
			->with('places', $places);
	}

}
