<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use App\Models\Girlfriend;
use App\Models\Rent;
use App\Models\User;

class RentController extends Controller
{
  public function create(Request $request)
  {
  	$girlfriend = Girlfriend::find($request->girlfriend_id);
    if (auth()->user()->alreadyHasRent()) {
      return response()->json(['message' => "You already have pending or active Rent."]);
    }else {
      $rent = auth()->user()->rents()->create($request->except('girlfriend_id') + [
        'girlfriend_id' => $request->girlfriend_id,
        'price' => $girlfriend->rate,
        'schedule' => now()
      ]);
      return response()->json($rent);  
    }
  	
  }

  public function delete($id)
  {
    $rent = Rent::find($id);
    $response = [
      'girlfriend_id' => $rent->girlfriend->id,
      'user_id' => $rent->user->id,
      'id' => $rent->id
    ];
    $rent->delete();
    return response()->json($response);
  }

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

  public function acceptRequest($id) {
    $girlfriend = auth()->user()->girlfriend()->first();

    $acceptRent = Rent::find($id);
    $acceptRent->update(['status' => 'accepted']);
    $girlfriend->update(['availability' => false]);

    $ignoreRents = $girlfriend->rents()
                              ->where(['status' => 'pending'])
                              ->where('id', '!=' , $id)
                              ->get();

    $message = $girlfriend->username." accepted your rent request";
    $status = "accepted";

    $user = User::find($acceptRent->user_id);
    $user->notify(new UserNotification($message, $status));

    if($ignoreRents->isNotEmpty()) {
      foreach($ignoreRents as $ignore) {
        $ignore->delete();
      }
    }
    
    return response()->json([
      'rent' => $acceptRent,
      'user' => $acceptRent->user
    ]);
  }

  public function declineRequest($id) {
    $rent = Rent::find($id);
    $rent->update(['status' => 'declined']);

    $girlfriend = auth()->user()->girlfriend()->first();
    $message = $girlfriend->username." declined your request LoL";
    $status = "declined";

    $user = User::find($rent->user_id);
    $user->notify(new UserNotification($message, $status));
  }

}
