<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Girlfriend;
use App\Models\Rent;
use Auth;

class PagesController extends Controller
{
  public function index() 
  {
    if (Auth::user()) {
      return redirect()->route('profile');
    }else {
      return view('pages.index');
    }
  }

  public function profile()
  {
    return view('user.profile');
  }

  public function girlfriendAccount()
  {
    $girlfriend = auth()->user()->girlfriend()->first();
    if (auth()->user()->alreadyRegisteredGirlfriend()) {
      return view('user.girlfriend_account', [
        'girlfriend' => $girlfriend
      ]); 
    }else {
      abort(404); 
    }
  }

  public function settings()
  {
    return view('user.settings');
  }

  public function myRent()
  {
    $girlfriend = auth()->user()->rents()->where('status', '=','pending')->first();
    if(auth()->user()->alreadyHasRent()) {
      return view('user.my_rent',[
        'girlfriend' => $girlfriend->girlfriend
      ]);
    } else{
      return view('user.no_rent');
    }
  }

  public function rentgirlfriend($username)
  {
    $girlfriend = Girlfriend::where('username', '=', $username)
                            ->with('user')
                            ->first();
    if ($girlfriend->status != 'accepted') {
      abort(404);
    }else {
      return view('pages.rent_account', [
        'girlfriend' => $girlfriend
      ]);  
    }/* ========= CHECK IF GIRLFRIEND IS ACCPETED BEFORE RENTING ========== */
  }

  public function rent()
  {
    $girlfriends = Girlfriend::count();
    return view('pages.rent_list', [
      'girlfriends' => $girlfriends
    ]);
  }/*=================== RENT VIEW ====================*/

  public function tags()
  {
  	
  }

  public function search()
  {
  	return view('pages.search');
  }/*=================== SEARCH GIRLFRIEND VIEW ====================*/

  public function apply()
  {
    if(auth()->user()->alreadyRegisteredGirlfriend()){
      return view('user.apply_requested');
    }else {
      return view('user.apply_form');
    }
  }/*=================== APPLY AS GIRLFRIEND VIEW ====================*/
}
