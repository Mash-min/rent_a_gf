@extends('layouts.app')

@section('content')
<nav class="blue lighten-1">
  <div class="nav-wrapper container">
    <a href="#!" class="brand-logo right">Rent</a>
    <a href="#" data-activates="slide-out" class="button-collapse">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</nav><!-- navbar -->

<div class="row body-components-container">
  <div class="row profile-header">
    <div class="profile-cover col l3 m4 offset-m4 s6 offset-s3">
      @if($girlfriend->user->image == 'no-image.jpg')
        <img src="{{ asset('images/avatar.png') }}" alt="" class="max-width circle">
      @else
        <img src="/storage/images/profiles/{{ $girlfriend->user->image }}" alt="" class="max-width circle">
      @endif
    </div>
    <div class="col l9 m10 offset-m1 profile-details">
      <h4>{{ $girlfriend->username }}</h4>
      <b><i class="fa fa-map-marker"></i> {{$girlfriend->user->address }}</b><br>
      <ul class="collection">
        <li class="collection-item">
          <i class="fa fa-envelope"></i> Email: {{ $girlfriend->user->email }}
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
        <li id="rent-btn-container">
          <!-- ============= APPEND BUTTON HERE ============ -->
        </li>
      </ul>
    </div>  
  </div>
  
</div><!-- body-components-container -->
@endsection

@section('scripts')
  <script src="/js/user/rent.js"></script>
  <script type="text/javascript" src="/js/user/rent_girlfriend.js"></script>
  <script>
    $(document).ready(() => {
      checkGirlfriendRent('{{ $girlfriend->id }}');
    });
  </script>
@endsection