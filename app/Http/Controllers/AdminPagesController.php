<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Girlfriend;
use App\Models\Rent;

class AdminPagesController extends Controller
{
	public function dashboard()
	{
		$users = User::orderBy('created_at','DESC')->get();
		$girlfriends = Girlfriend::orderBy('created_at', 'DESC')
								 ->where('status','=','accepted')
								 ->paginate(10);
		$topGirlfriends = Girlfriend::orderBy('username','DESC')
								->where('status','=','accepted')
								->paginate(10);
		return view('admin.dashboard',[
			'users' => $users,
			'girlfriends' => $girlfriends,
			'topGirlfriends' => $topGirlfriends
		]);
	}/*=================== DASHBOARD VIEW ====================*/

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

	public function girlfriendrequests()
	{
		return view('admin.girlfriendrequests');
	}

	public function activerents()
	{
		return view('admin.activerents');
	}

	/*===============================================================*/
	/*+++++++++++++++++++++++ ADMIN JSON REPONSES +++++++++++++++++++*/
	/*===============================================================*/

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

	public function dashboardTopGirlfriendsJSON()
	{
		$girlfriends = Girlfriend::orderBy('created_at', 'DESC')
								 ->where('status','=','accepted')
								 ->with('user')
								 ->with('rents')
								 ->paginate(10);
		return response()->json(['girlfriends' => $girlfriends]);
	}

	public function accountlistJSON()
	{
		$users = User::orderBy('firstname', 'ASC')->paginate(10);
		return response()->json([
			'users' => $users
		]);
	}/*=================== JSON FOR ACCOUNT LISTS ====================*/

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

	public function girlfriendrequestsJSON()
	{
		$girlfriends = Girlfriend::orderBy('username', 'DESC')
								  ->where('status', '=', 'pending')
								  ->with('user')
								  ->paginate(20);
	    return response()->json([
		  'girlfriends' => $girlfriends
		]);
	}/*=================== JSON FOR GIRLFRIEND REQUESTS ====================*/

	public function girlfriendlistJSON()
	{
		$girlfriends = Girlfriend::orderBy('username','DESC')
								 ->where('status', '=', 'accepted')
								 ->with('user')
								 ->paginate(20);
		return response()->json([
			'girlfriends' => $girlfriends
		]);
	}/*=================== JSON FOR GIRLFRIEND LIST ====================*/

	public function searchGirlfriend($girlfriend)
  {
  	$girlfriend = Girlfriend::where('username', 'like', '%'.$girlfriend.'%')
							->where('status', '=', 'accepted')
							->with('user')
							->paginate(20);
  	return response()->json([
  		'girlfriends' => $girlfriend
  	]);
  }/*=================== JSON FOR SEARCH GIRLFRIEND ====================*/

  public function findGirlfriend($id)
  {
  	$girlfriend = Girlfriend::find($id);
  	return response()->json([
  		'girlfriend' => $girlfriend,
  		'user' => $girlfriend->user,
  		'tags' => $girlfriend->tags
  	]);
  }/*=================== JSON FOR FINDING GIRLFRIEND ====================*/

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

  public function activerentsJSON()
  {
	  $rents = Rent::orderBy('created_at','ASC')
	  				->where('status','=','active')
					->with('user')
					->with('girlfriend')
					->paginate(20);
  	return response()->json([
  		'rents' => $rents
  	]);
  }/*=================== JSON FOR ACTIVE RENTS ====================*/

}
