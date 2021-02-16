<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\Girlfriend;
use App\Models\Rent;
use App\Models\Tags;
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
      return view('girlfriend.girlfriend_account', [
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
    $rent = auth()->user()->rents()->where('status', '=','pending')
                                   ->orWhere('status', '=', 'accepted')
                                   ->first();
    if($rent == null) { 
      return view('rent.rent_none'); 
    } elseif($rent->status == 'pending') {
      $girlfriend = $rent->girlfriend()->first(); 
      return view('rent.rent_pending',[
        'girlfriend' => $girlfriend,
        'rent' => $rent
      ]); 
    } elseif($rent->status == 'accepted') {
      $girlfriend = $rent->girlfriend()->first(); 
      return view('rent.rent_accepted',[
        'girlfriend' => $girlfriend,
        'rent' => $rent
      ]);
    }
  }/* ============= CHECK RENT PAGE DEPENDS ON RENT STATUS ================*/

  public function notifications()
  {
    return view('user.notifications');
  }

  public function rentgirlfriend($username)
  {
    $girlfriend = Girlfriend::where('username', '=', $username)
                            ->with('user')
                            ->first();
    if ($girlfriend->status == 'pending' or $girlfriend->availability == false) {
      return view('redirects.girlfriend_not_available', [
        'girlfriend' => $girlfriend
      ]);
    }else {
      if($girlfriend->user_id == auth()->user()->id) { abort(404); }
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
    $tags = Tags::orderBy('tag', 'ASC')->get();
  	return view('pages.tags', [
      'tags' => $tags
    ]);
  }

  public function search()
  {
  	return view('pages.search');
  }/*=================== SEARCH GIRLFRIEND VIEW ====================*/

  public function apply()
  {
    if(auth()->user()->alreadyRegisteredGirlfriend()){
      return view('redirects.apply_requested');
    }else {
      return view('user.apply_form');
    }
  }/*=================== APPLY AS GIRLFRIEND VIEW ====================*/
}
