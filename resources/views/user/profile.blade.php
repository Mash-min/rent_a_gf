@extends('layouts.app')

@section('content')
<nav class="blue lighten-1">
  <div class="nav-wrapper container">
    <a href="#!" class="brand-logo center">Profile</a>
    <a href="#" data-activates="slide-out" class="button-collapse">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</nav><!-- navbar -->

<div class="row body-components-container">
  <div class="col s12 profile-header">
    <div class="profile-cover col l4 offset-l4 m4 offset-m4 s6 offset-s3">
      @if(Auth::user()->image == 'no-image.jpg')
        <img src="{{ asset('images/avatar.png') }}" alt="" class="max-width circle">
      @else
        <img src="/storage/images/profiles/{{ Auth::user()->image }}" alt="" class="max-width circle">
      @endif
    </div>
    <div class="col s12 m10 offset-m1 profile-details">
      <div class="center">
        <h4>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h4>
        <b><i class="fa fa-map-marker"></i> {{ Auth::user()->address }}</b>
      </div>
      <ul class="collection">
        <li class="collection-item">
          <i class="fa fa-envelope"></i> Email: {{ Auth::user()->email }}
        </li>
        <li class="collection-item">
          <i class="fa fa-hashtag"></i> Contact: {{ Auth::user()->contact }}
        </li>
        <li class="collection-item">
          <i class="fa fa-pencil"></i> Bio: {!! Auth::user()->bio !!}
        </li>
        <li class="collection-item">
          <i class="fa fa-list"></i> Total Rents: {{ Auth::user()->rents()->where('status','complected')->count() }}
        </li>
        <li class="collection-item">
          <a href="{{ route('settings') }}" class="btn btn-flat waves-effect waves-light blue lighten-1 white-text max-width">
            Update account
          </a>
        </li>
      </ul>
    </div>
  </div>

</div><!-- body-components-container -->
@endsection