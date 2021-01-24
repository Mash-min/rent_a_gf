<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Girlfriend;

class GirlfriendController extends Controller
{
  public function create(Request $request)
  {
  	$user = User::find($request->user_id);
  	$girlfriend = $user->girlfriend()->create($request->all());
  	return response()->json($girlfriend);
  }

  public function acceptRequest($id)
  {
  	$girlfriendRequest = Girlfriend::find($id);
  	$girlfriendRequest->update([
  		'status' => 'accepted',
  		'availability' => true
  	]);
  }

  public function declineRequest($id)
  {
  	$girlfriendRequest = Girlfriend::find($id);
  	$girlfriendRequest->update([
  		'status' => 'declined'
  	]);
  }
}
