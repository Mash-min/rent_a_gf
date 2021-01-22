@extends('layouts.app')

@section('content')
<nav class="red lighten-1">
  <div class="nav-wrapper container">
    <a href="#" data-activates="slide-out" class="button-collapse">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</nav><!-- navbar -->

<div class="row body-components-container">
  <div class="col l4 m5 s10 offset-s1">
    <div class="profile-image-container">
      <img src="images/avatar.jpg">
      <button class="btn btn-flat blue lighten-1 white-text change-profile-btn waves-effect waves-light">
        <i class="fa fa-camera"></i>
      </button>
    </div>
    <hr>
    <p class="profile-bio">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    </p>
  </div>
  <div class="col l8 m7 s12">
    <ul class="collection with-header">
      <li class="collection-header">
        <h4 class="profile-header">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</h4>
      </li>
      <li class="collection-item">Address <br> <b>San Jose del Monte Bulcan</b></li>
      <li class="collection-item">Age <br> <b>22 Years Old</b></li>
      <li class="collection-item">Email <br> <b>{{ auth()->user()->email }}</b></li>
      <li class="collection-item">Contact <br> <b>#{{ auth()->user()->contact }}</b></li>
    </ul>
  </div>
</div><!-- body-components-container -->
@endsection