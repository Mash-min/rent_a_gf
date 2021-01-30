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
  	$girlfriend = Girlfriend::find(Crypt::decryptString($request->girlfriend_id));
  	$rent = auth()->user()->rents()->create($request->except('girlfriend_id') + [
  		'girlfriend_id' => Crypt::decryptString($request->girlfriend_id),
  		'price' => $girlfriend->rate,
  		'schedule' => now()
  	]);
  	return response()->json($rent);
  }
}
