<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Girlfriend;
use App\Models\Rent;
use Illuminate\Validation\Rule;

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
		return view('admin.account_list');
	}

	public function addgirlfriend()
	{
		return view('admin.girlfriend_add');
	}

	public function girlfriendlist()
	{
		return view('admin.girlfriend_list');
	}

	public function girlfriendrequests()
	{
		return view('admin.girlfriend_requests');
	}

	public function girlfriendArchive()
	{
		return view('admin.girlfriend_archive');
	}

	public function activerents()
	{
		return view('admin.activerents');
	}

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
