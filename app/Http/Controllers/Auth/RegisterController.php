<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
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
    return redirect()->route('profile');
  }

  public function update(UserUpdateValidation $request)
  {
    $user = User::find(auth()->user()->id);
    $this->validate($request, [
      'email' => [
        'required',
        Rule::unique('users')->ignore($user->id),
      ],
      'contact' => [
        'required',
        Rule::unique('users')->ignore($user->id),
      ]    
    ]);
    $user->update($request->all());
    return redirect()->route('profile');
  }

  public function updateImage(Request $request)
  {
    $image = $request->image;
    $imageName = "profile".time()."_".auth()->user()->username.$image->getClientOriginalName();
    Storage::delete('public/images/profiles/'.auth()->user()->image);
    $path = $image->storeAs('public/images/profiles/', $imageName);
    auth()->user()->update(['image' => $imageName]);
    return response()->json($imageName);
  }

  public function checkPassword(Request $request)
  {
    if (Hash::check($request->password, auth()->user()->password)) {
      return true;
    }else {
      return response()->json(['error' => "Invalid Password"],404);
    }
  }

  public function resetPassword(Request $request)
  {
    auth()->user()->update([
      'password' => Hash::make($request->password)
    ]);
    return response()->json([
      'message' => 'success'
    ]);
  }

}
