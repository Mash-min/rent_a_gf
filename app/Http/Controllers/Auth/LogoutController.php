<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LogoutController extends Controller
{
  public function create()
  {
  	auth()->logout();
  	return redirect()->route('index');
  }
}
