<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Girlfriend;

class PagesController extends Controller
{
  public function index() 
  {
  	return view('pages.index');
  }

  public function profile()
  {
    return view('pages.profile');
  }

  public function settings()
  {
    return view('pages.settings');
  }

  public function girlfriend()
  {
    return view('pages.girlfriend');
  }

  public function rentgirlfriend($username)
  {
    $girlfriend = Girlfriend::where('username', '=', $username)
                              ->with('user')
                              ->get();
    return view('pages.rentgirlfriend', [
      'girlfriend' => $girlfriend
    ]);
  }

  public function rent()
  {
    $girlfriends = Girlfriend::orderBy('username', 'DESC')
                              ->where('availability','=',true)
                              ->paginate(20);
    return view('pages.rent', [
      'girlfriends' => $girlfriends
    ]);
  }

  public function tags()
  {
  	
  }

  public function search()
  {
  	return view('pages.search');
  }

  public function apply()
  {
    if(auth()->user()->alreadyRegisteredGirlfriend()){
      return view('pages.apply_request');
    }else {
      return view('pages.apply');
    }
  }

  public function rentgirlfriendJSON()
  {
    $girlfriends = Girlfriend::orderBy('username', 'DESC')
                              ->where('availability','=',true)
                              ->with('user')
                              ->paginate(20);
    return response()->json([
      'girlfriends' => $girlfriends
    ]);
  }

  public function searchgirlfriendJSON($username)
  {
    $girlfriend = Girlfriend::where('username', 'like','%'.$username.'%')
                              ->where('status','=','accepted')
                              ->orderBy('username','DESC')
                              ->with('user')
                              ->get();
    return response()->json([
      'girlfriend' => $girlfriend
    ]);
  }
}
