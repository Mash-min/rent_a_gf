<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

}
