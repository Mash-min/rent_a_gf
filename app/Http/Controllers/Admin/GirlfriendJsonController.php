<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Girlfriend;
use App\Models\Rent;
use Auth;

class GirlfriendJsonController extends Controller
{
    public function dashboardTopGirlfriendsJSON()
    {
      $girlfriends = Girlfriend::orderBy('created_at', 'DESC')
                  ->where('status','=','accepted')
                  ->with('user')
                  ->with('rents')
                  ->paginate(10);
      return response()->json(['girlfriends' => $girlfriends]);
    }/*=================== JSON FOR TOP GIRLFRIENDS  (DASHBOARD_PAGE)====================*/
    
    public function searchgirlfriendJSON($username)
    {
      $girlfriend = Girlfriend::where('username', 'like','%'.$username.'%')
                              ->where('status','=','accepted')
                              ->orderBy('username','DESC')
                              ->with('user')
                              ->get();
      return response()->json(['girlfriend' => $girlfriend]);
    }/*=================== JSON FOR GIRLFRIEND RENT  (SEARCH GIRLFRIEND_RENT PAGE)====================*/

    public function rentgirlfriendJSON()
    {
      $girlfriends = Girlfriend::orderBy('username', 'DESC')
                              ->where('availability','=',true)
                              ->where('status','=','accepted')
                              ->with('user')
                              ->paginate(8);
      return response()->json(['girlfriends' => $girlfriends]);
    }/*=================== JSON FOR GIRLFRIEND RENT  (RENT_GIRLFRIEND_PAGE)====================*/

    public function girlfriendlistJSON()
    {
      $girlfriends = Girlfriend::orderBy('username','DESC')
                  ->where('status', '=', 'accepted')
                  ->with('user')
                  ->paginate(10);
      return response()->json(['girlfriends' => $girlfriends]);
    }/*=================== JSON FOR GIRLFRIEND LIST  (GIRLFRIEND_LIST_PAGE)====================*/

    public function findGirlfriend($id)
    {
      $girlfriend = Girlfriend::findOrFail($id);
      return response()->json([
        'girlfriend' => $girlfriend,
        'user' => $girlfriend->user,
        'tags' => $girlfriend->tags
      ]);
    }/*=================== JSON FOR FINDING GIRLFRIEND (GIRLFRIEND_LIST_PAGE) ====================*/

    public function girlfriendrequestsJSON()
    {
      $girlfriends = Girlfriend::orderBy('username', 'DESC')
                    ->where('status', '=', 'pending')
                    ->with('user')
                    ->paginate(20);
        return response()->json(['girlfriends' => $girlfriends]);
    }/*=================== JSON FOR GIRLFRIEND REQUESTS (GIRLFRIEND_REQUESTS_PAGE) ====================*/

    public function searchGirlfriend($girlfriend)
    {
      $girlfriend = Girlfriend::where('username', 'like', '%'.$girlfriend.'%')
                  ->where('status', '=', 'accepted')
                  ->with('user')
                  ->paginate(20);
      return response()->json(['girlfriends' => $girlfriend]);
    }/*=================== JSON FOR SEARCH GIRLFRIEND (GIRLFRIEND_LIST_PAGE) ====================*/

    public function rentRequestsJSON()
    {
      $girlfriend = auth()->user()->girlfriend()->first();
      $requests = $girlfriend->rents()->orderBy('created_at','DESC')
                                         ->where('status','pending')
                                         ->with('user')
                                         ->with('girlfriend')
                                         ->paginate(2);
      return response()->json(['requests' => $requests]);
    }/*=================== JSON FOR GIRLFRIEND RENT REQUESTS  (GIRLFRIEND_ACCOUNT_PAGE)====================*/
}
