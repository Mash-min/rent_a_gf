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
		$girlfriends = Girlfriend::orderBy('created_at', 'DESC')
															->where('status','=','accepted')
															->get();
		$topGirlfriends = Girlfriend::orderBy('username','DESC')
															->where('status','=','accepted')
															->limit(10)
															->get();
		return view('admin.dashboard',[
			'users' => $users,
			'girlfriends' => $girlfriends,
			'topGirlfriends' => $topGirlfriends
		]);
	}

	public function accountlist()
	{
		return view('admin.accountlist');
	}

	public function accountlistJSON()
	{
		$users = User::orderBy('firstname', 'ASC')->paginate(10);
		return response()->json([
			'users' => $users
		]);
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
	}

	public function addgirlfriend()
	{
		return view('admin.addgirlfriend');
	}

	public function girlfriendlist()
	{
		return view('admin.girlfriendlist');
	}

	public function girlfriendrequests()
	{
		return view('admin.girlfriendrequests');
	}

	public function girlfriendrequestsJSON()
	{
		$girlfriends = Girlfriend::orderBy('username', 'DESC')
															->where('status', '=', 'pending')
															->with('user')
															->paginate(20);
		return response()->json([
			'girlfriends' => $girlfriends
		]);
	}

	public function girlfriendlistJSON()
	{
		$girlfriends = Girlfriend::orderBy('username','DESC')
															->where('status', '=', 'accepted')
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
															->where('status', '=', 'accepted')
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
