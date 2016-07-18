<?php 
namespace App\Http\Controllers;
use Validator;
use Redirect;
use Illuminate\Http\Request;
use App\Model\Profile as Profile;
use App\Model\User as User;
use App\Model\Group as Group;
use Illuminate\Support\Facades;
use Input;
use Hash;
use Auth;

class UsersController extends Controller 
{

	public function index()
	{
		return view('auth.login');
	}

	public function postRegister(Request $request)
	{
		//var_dump(Input::all());
		$rules = array(
			'email' => 'required|unique:users|email',
			'password' => 'required',
			'name' => 'required'
		);
		//return Hash::make(Input::get('password'));
		$validator = Validator::make($request->input(), $rules);

		if($validator->fails()){
			var_dump($validator->messages());
		}

		$profile = new Profile();
		$profile->name = $request->input('name');
		$profile->save();

		$user = new User();
		$user->profile_id = $profile->id;
		$user->email = $request->input('email');
		$user->password = Hash::make($request->input('password'));
		$user->group_id = 2;
		$user->save();

		return Redirect::to('login')
			->with('message', 'User has been added');

	}

	public function postLogin()
	{
		if(Auth::attempt(array(
			'email' 		=> Input::get('email'),
			'password' 		=> Input::get('password'),
			'id'			=> User::getId(Input::get('email')),
			'group_id'		=> User::getGroup(Input::get('email'))
			)))
		{
			$group_id = User::getGroup(Input::get('email'));

			switch($group_id)
			{
				case Group::ADMIN:
					// ke dashboard admin
					return Redirect::to('admin');
					break;
				default:
					// ke sales admin
					return Redirect::to('booking');
					break;
			}
		} 
		else 
		{
			return redirect::back()->with('errors', "Wrong Email/Password!");
		}

	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}
}
