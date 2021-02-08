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
    return view('pages.profile');
  }

  public function girlfriendAccount()
  {
    $girlfriend = auth()->user()->girlfriend()->first();
    if (auth()->user()->alreadyRegisteredGirlfriend()) {
      return view('pages.girlfriend_account', [
        'girlfriend' => $girlfriend
      ]); 
    }else {
      abort(404); 
    }
  }

  public function settings()
  {
    return view('pages.settings');
  }

  public function girlfriend()
  {
    $girlfriend = auth()->user()->rents()->where('status', '=','pending')->get();
    if(auth()->user()->alreadyHasRent()) {
      return view('pages.girlfriend',[
        'girlfriend' => $girlfriend[0]
      ]);
    } else{
      return view('pages.no_rent');
    }
  }

  public function rentgirlfriend($username)
  {
    $girlfriend = Girlfriend::where('username', '=', $username)
                              ->with('user')
                              ->get();
    if ($girlfriend[0]->status != 'accepted') {
      abort(404);
    }else {
      return view('pages.rentgirlfriend', [
        'girlfriend' => $girlfriend[0]
      ]);  
    }/* ========= CHECK IF GIRLFRIEND IS ACCPETED BEFORE RENTING ========== */
  }

  public function rent()
  {
    $girlfriends = Girlfriend::orderBy('username', 'DESC')
                              ->where('availability','=',true)
                              ->paginate(20);
    return view('pages.rent', [
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
      return view('pages.apply_request');
    }else {
      return view('pages.apply');
    }
  }/*=================== APPLY AS GIRLFRIEND VIEW ====================*/


  /*===============================================================*/
  /*+++++++++++++++++++++++  JSON REPONSES ++++++++++++++++++++++++*/
  /*===============================================================*/
  public function rentgirlfriendJSON()
  {
    $girlfriends = Girlfriend::orderBy('username', 'DESC')
                              ->where('availability','=',true)
                              ->where('status','=','accepted')
                              ->with('user')
                              ->paginate(8);
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
