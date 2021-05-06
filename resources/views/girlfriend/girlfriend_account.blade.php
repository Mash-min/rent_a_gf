@extends('layouts.app')

@section('content')
<nav class="blue lighten-1">
  <div class="nav-wrapper container">
    <a href="/" class="brand-logo center">Rent a Girlfriend</a>
    <a href="#" data-activates="slide-out" class="button-collapse">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</nav><!-- navbar -->

{{ @csrf_field() }}
<div class="row body-components-container">
  <div class="col s12 profile-header">
    <div class="profile-cover col l3 m4 offset-m4 s6 offset-s3">
      @if(Auth::user()->image == 'no-image.jpg')
        <img src="{{ asset('images/avatar.png') }}" alt="" class="max-width circle">
      @else
        <img src="/storage/images/profiles/{{ Auth::user()->image }}" alt="" class="max-width circle">
      @endif
    </div>
    <div class="col l9 m10 offset-m1 profile-details">
      <h4>{{ $girlfriend->username }}</h4>
      <b><i class="fa fa-map-marker"></i> {{ Auth::user()->address }}</b><br>
      <ul class="collection">
        <li class="collection-item">
          <i class="fa fa-envelope"></i> Email: {{ Auth::user()->email }}
        </li>
        <li class="collection-item">
          <i class="fa fa-hashtag"></i> Contact: {{ Auth::user()->contact }}
        </li>
        <li class="collection-item">
          @foreach($girlfriend->tags as $tag)
            <div class="chip grey darken-2 white-text"><i class="fa fa-tag"></i> {{ $tag->tag }}</div>
          @endforeach
        </li>
        <li class="collection-item">
          <i class="fa fa-pencil"></i> Description: {!! $girlfriend->description !!}
        </li>
        <li class="collection-item">
          <i class="fa fa-list"></i> Total Rents: {{  $girlfriend->rents()->where('status','completed')->count() }}
        </li>
        <li class="collection-item">
          <a href="{{ route('settings') }}" class="btn btn-flat waves-effect waves-light blue lighten-1 white-text max-width">
            Update account
          </a>
        </li>
      </ul>
    </div>
    
    <div class="col s12">
      <ul class="collection with-header">
        <li class="collection-header">
          <h5>Requests</h5>
        </li>
        <div id="rent-request-container">
          <!-- ============== APPEND HERE ================ -->
        </div>
        <li>
          <button class="btn btn-flat blue lighten-1 waves-effect waves-light white-text max-width" id="view-more-request-btn">
            <i class="fa fa-chevron-down"></i>
          </button>
        </li>
      </ul>
    </div>
  </div>
  
</div><!-- body-components-container -->
@endsection

@section('scripts')
  <script src="/js/admin/account_edit_girlfriend.js"></script>
  <script src='/js/user/rent.js'></script>
  <script src="/js/user/rent_requests.js"></script>
@endsection