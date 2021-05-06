<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Girlfriend;
use App\Http\Requests\GirlfriendRequestValidation;

class GirlfriendController extends Controller
{
  public function create(GirlfriendRequestValidation $request)
  {
  	$user = User::find($request->user_id);
    $girlfriend = $user->girlfriend()->create($request->except('username') + [
      'username' => str_replace(" ", "-", $request->username)
    ]);
    return response()->json([
      'girlfriend' => $girlfriend
    ]); 
  }

  public function update(Request $request, $id)
  {
    $girlfriend = Girlfriend::findOrFail($id);
    $girlfriend->update($request->except('username') + [
      'username' => str_replace(" ", "-", $request->username)
    ]);
    return response()->json([
      'girlfriend' => $girlfriend,
      'user' => $girlfriend->user()->first()
    ]);
  }

  public function archive($id) {
    $girlfriend = Girlfriend::find($id);
    $girlfriend->update([
      'status' => 'archived',
      'availability' => false
    ]);
  }

  public function removeArchive($id) 
  {
    $girlfriend = Girlfriend::find($id);
    $girlfriend = Girlfriend::find($id);
    $girlfriend->update([
      'status' => 'accepted',
      'availability' => 1
    ]);
  }

  public function applygirlfriend(Request $request)
  {
    $girlfriend = auth()->user()->girlfriend()->create($request->except('username') + [
      'username' => str_replace(" ", "-", $request->username)
    ]);
    return response()->json([
      'girlfriend' => $girlfriend
    ]);
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
