@extends('layouts.app')

@section('content')

<nav class="red lighten-1">
  <div class="nav-wrapper container">
    <a href="#!" class="brand-logo right">Rent a Girlfriend</a>
    <a href="#" data-activates="slide-out" class="button-collapse">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</nav><!-- navbar -->

<div class="row body-components-container">
  <div class="col l4 m5 s10 offset-s1">
    <div class="profile-image-container">
      @if($girlfriend->user->image == 'no-image.jpg')
        <img src="/images/avatar.jpg" class="profile-image">
      @else
        <img src="/storage/images/profiles/{{ $girlfriend->user->image }}" class="profile-image">
      @endif

      <div id="rent-btn-container">
        <button class="btn btn-flat green lighten-1 white-text change-profile-btn waves-effect waves-light modal-trigger" onclick="rentGirlfriend('{{ $girlfriend->id }}')">
          Rent girlfriend
        </button>
      </div>
    </div>
    <hr>
    <p class="profile-bio">
      "{{ $girlfriend->user->bio }}"
    </p>
  </div>
  <div class="col l8 m7 s12">
    <ul class="collection with-header">
      <li class="collection-header">
        <h4 class="profile-header">{{ $girlfriend->username }}</h4><br>
        @foreach($girlfriend->tags as $tag)
          <div class="chip profile-tag">
            <a href="">#{{ $tag->tag }}</a>
          </div>
        @endforeach
        
      </li>
      <li class="collection-item">Fullname <br> <b>{{ $girlfriend->user->firstname }} {{ $girlfriend->user->lastname }}</b></li>
      <li class="collection-item">Address <br> <b>{{ $girlfriend->user->address }}</b></li>
      <li class="collection-item">Age <br> <b>22 Years Old</b></li>
      <li class="collection-item">Email <br> <b>{{ $girlfriend->user->email }}</b></li>
      <li class="collection-item">Contact <br> <b>#{{ $girlfriend->user->contact }}</b></li>
      <li class="collection-item">Rate <br> <b>${{ $girlfriend->rate }}.00</b></li>
      <li class="collection-item">Rating <br>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
      </li>
      <li class="collection-item">Total rents <br> <b> {{ $girlfriend->rents->count() }}</b></li>
    </ul>
  </div>
</div><!-- body-components-container -->
@endsection

@section('scripts')
  <script type="text/javascript" src="/js/rent.js"></script>
@endsection