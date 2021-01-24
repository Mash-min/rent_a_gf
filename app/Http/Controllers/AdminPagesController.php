<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Girlfriend;

class AdminPagesController extends Controller
{
	public function dashboard()
	{
		$users = User::orderBy('created_at','DESC')->get();
		return view('admin.dashboard',[
			'users' => $users
		]);
	}

	public function accountlist()
	{
		return view('admin.accountlist');
	}

	public function addgirlfriend()
	{
		return view('admin.addgirlfriend');
	}

	public function girlfriendlist()
	{
		return view('admin.girlfriendlist');
	}

	public function girlfriendlistJSON()
	{
		$girlfriends = Girlfriend::orderBy('created_at','DESC')->with('user')->get();
		return response()->json([
			'girlfriends' => $girlfriends
		]);
	}

	public function chooseuser($user)
  {
    $user = User::where('firstname', 'like', '%'.$user.'%')
    							->orWhere('lastname', 'like', '%'.$user.'%')
    							->orWhere('email', 'like', '%'.$user.'%')
    							->paginate(20);
    return response()->json([
      'user' => $user
    ]);
  }

}
