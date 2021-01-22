<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
  public function index()
  {
  	return view('auth.register');
  }

  public function create(Request $request)
  {
    $this->validate($request, [
    	'firstname' => 'required',
    	'lastname' => 'required',
    	'contact' => 'required',
    	'birthdate' => 'required',
    	'email' => 'required',
    	'email' => 'required|unique:users,email',
      'password' => 'required|confirmed'
    ]);

    $user = User::create($request->except('password') + [
    	'password' => Hash::make($request->password)
    ]);
    auth()->attempt($request->only('email', 'password'));
    return redirect()->route('index');
  }

  public function update(Request $request)
  {
    $user = User::find(auth()->user()->id);
    $user->update($request->except('image') + [
      'image' => 'no-image.jpg'
    ]);

    return redirect()->route('profile');
  }

}
