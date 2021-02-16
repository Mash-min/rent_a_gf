@extends('layouts.app')

@section('content')
<nav class="blue lighten-1">
  <div class="nav-wrapper container">
    <a href="#!" class="brand-logo center">Rent a Girlfriend</a>
    <a href="#" data-activates="slide-out" class="button-collapse">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</nav><!-- navbar -->

<div class="row body-components-container">
  <div class="col l4 m5 s10 offset-s1">
    <ul class="collection with-header">
      <li class="collection-item profile-image-collection">
        <div class="profile-image-container">
          @if(auth()->user()->image == 'no-image.jpg')
            <img src="images/avatar.jpg" class="profile-image">
          @else
            <img src="/storage/images/profiles/{{ auth()->user()->image }}" class="profile-image">
          @endif
        </div>
      </li>
      <li class="collection-item center" style="text-align:justify">
        <p>{{ Auth::user()->bio }}</p>
      </li>
      @if(auth()->user()->alreadyRegisteredGirlfriend())
        <li class="collection-item center">
          <a href="{{route('girlfriend-account')}}" class="btn btn-flat waves-effect waves-light blue white-text" style="width: 100%">
            <i class="fa fa-exchange fa-2x"></i> Girlfriend Account
          </a>
        </li>
      @endif
    </ul>
  </div>
  <div class="col l8 m7 s12">
    <ul class="collection with-header">
      <li class="collection-header">
        <h4 class="profile-header">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</h4>
      </li>
      <li class="collection-item">Address <br> <b>{{ auth()->user()->address }}</b></li>
      <li class="collection-item"><b>Notifications </b>
        <a href="{{ route('notifications') }}" class="secondary-content">
          <span class="red badge white-text new">
            {{ auth()->user()->unreadNotifications->count() }} 
          </span>
        </a>
      </li>
      <li class="collection-item">Age <br> <b>22 Years Old</b></li>
      <li class="collection-item">Email <br> <b>{{ auth()->user()->email }}</b></li>
      <li class="collection-item">Contact <br> <b>#{{ auth()->user()->contact }}</b></li>
      <li class="collection-item">Total Rents <br> <b>{{ auth()->user()->girlfriend()->count() }} rents</b></li>
      <li class="collection-item">
        <a href="{{ route('settings') }}" class="btn btn-flat blue lighten-1 white-text waves-effect waves-light" style="width: 100%">
          Account setting
        </a>
      </li>
    </ul>
  </div>
</div><!-- body-components-container -->
@endsection