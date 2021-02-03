<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
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
    $rent->delete();
    return response()->json([
      'girlfriend_id' => $rent->girlfriend->id
    ]);
  }

}
