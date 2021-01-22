<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function index() 
  {
  	return view('pages.index');
  }

  public function profile()
  {
    return view('pages.profile');
  }

  public function settings()
  {
    return view('pages.settings');
  }

  public function girlfriend()
  {
    return view('pages.girlfriend');
  }

  public function rent()
  {
    
  }

  public function tags()
  {
  	
  }

  public function search()
  {
  	
  }
}
