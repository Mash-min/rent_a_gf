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
		$girlfriends = Girlfriend::orderBy('created_at', 'DESC')->get();
		return view('admin.dashboard',[
			'users' => $users,
			'girlfriends' => $girlfriends
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
		$girlfriends = Girlfriend::orderBy('username','DESC')
															->with('user')
															->paginate(20);
		return response()->json([
			'girlfriends' => $girlfriends
		]);
	}

	public function chooseUser($user)
  {
    $user = User::where('firstname', 'like', '%'.$user.'%')
    							->orWhere('lastname', 'like', '%'.$user.'%')
    							->orWhere('email', 'like', '%'.$user.'%')
    							->paginate(20);
    return response()->json([
      'user' => $user
    ]);
  }

  public function searchGirlfriend($girlfriend)
  {
  	$girlfriend = Girlfriend::where('username', 'like', '%'.$girlfriend.'%')
  								->with('user')
    							->paginate(20);
  	return response()->json([
  		'girlfriends' => $girlfriend
  	]);
  }

  public function findGirlfriend($id)
  {
  	$girlfriend = Girlfriend::find($id);
  	return response()->json([
  		'girlfriend' => $girlfriend,
  		'user' => $girlfriend->user,
  		'tags' => $girlfriend->tags
  	]);
  }

}
