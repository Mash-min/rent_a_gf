<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Girlfriend;
use App\Models\Rent;
use Illuminate\Validation\Rule;

class UserJsonController extends Controller
{
	public function dashboardUsersJSON()
	{
		$users = User::orderBy('created_at','DESC')->get();
		$rents = Rent::orderBy('created_at','DESC')->get();
		$girlfriends = Girlfriend::orderBy('created_at','DESC')
								 ->where('status','=','accepted')
								 ->get();
		return response()->json([
			'count' => $users->count(),
			'rent_count' => $rents->count(),
			'girlfriends_count' => $girlfriends->count()
		]);
	}

    public function updateAccount(Request $request, $id)
	{
	  $user = User::find($id);
	  $this->validate($request, [
		'email' => ['required', Rule::unique('users')->ignore($user->id)],
		'contact' => ['required', Rule::unique('users')->ignore($user->id)]    
	  ]);
	  $user->update($request->except(['password','image','bio']));
	  return response()->json(['user' => $user]);
	}

    public function findAccount($id)
	{
	  $user = User::find($id);
	  return response()->json(['user' => $user]);
    }
    
    public function searchAccount($request)
	{
		$user = User::orderBy('firstname','ASC')
					->where('firstname','like','%'.$request.'%')
					->orWhere('lastname','like','%'.$request.'%')
					->orWhere('email','like','%'.$request.'%')
					->orWhere('contact','like','%'.$request.'%')
					->paginate(10);
		return response()->json([
			'user' => $user
		]);
	}/*=================== JSON FOR ACCOUNT SEARCH ====================*/

    public function accountlistJSON()
	{
		$users = User::orderBy('firstname', 'ASC')->paginate(10);
		return response()->json([
			'users' => $users
		]);
	}/*=================== JSON FOR ACCOUNT LISTS ====================*/

    public function chooseUser($user)
	{
		$user = User::where('firstname', 'like', '%'.$user.'%')
					->orWhere('lastname', 'like', '%'.$user.'%')
					->orWhere('email', 'like', '%'.$user.'%')
					->paginate(20);
		return response()->json([
		'user' => $user
		]);
	}/*=================== JSON FOR CHOOSING GIRLFRIEND IN ADDING GIRLFRIEND FORM ====================*/
}
