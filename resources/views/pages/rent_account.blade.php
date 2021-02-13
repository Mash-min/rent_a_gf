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
  <div class="row girlfriend-info-container">
    <div class="col l4">
      @if($girlfriend->image == 'no-image.jpg')
        <img src="{{ asset('images/avatar.png') }}" class="max-width">
      @else
        <img src="/storage/images/profiles/{{ $girlfriend->user->image }}" class="max-width">
      @endif
      @if(!auth()->user()->alreadyRentThisGirlfriend($girlfriend->id))
      <div id="rent-btn-container">
        <button class="btn btn-flat blue lighten-1 white-text change-profile-btn waves-effect waves-light" onclick="rentGirlfriend('{{ $girlfriend->id }}')">
					Rent Girlfriend
				</button>
      </div>
      @else
      <div id="rent-btn-container">
        <button class="btn btn-flat red lighten-1 white-text change-profile-btn waves-effect waves-light" onclick="deleteRent('{{ $girlfriend->activeRentId() }}')">
           Cancel rent
        </button>
      </div>
      @endif
    </div>
    <div class="col l8">
      <ul class="collection with-header">
        <li class="collection-header">
          <h5>{{ $girlfriend->username }}</h5>
        </li>
        <li class="collection-item">
          @foreach($girlfriend->tags()->get() as $tag)
          <div class="chip grey darken-2">
            <a href="" class="white-text">{{ $tag->tag }}</a>
          </div>
          @endforeach
        </li>
        @if($girlfriend->availability == true)
          <li class="collection-item"><i class="fa fa-circle green-text"></i> Available</li>
        @else
          <li class="collection-item"><i class="fa fa-circle grey-text"></i> Not available</li>
        @endif
        <li class="collection-item">
          <b>Rate:</b> ${{ $girlfriend->rate }}.00
        </li>
        <li class="collection-item"><b>Description:</b> 
          {!! $girlfriend->description !!}
        </li>
        <li class="collection-item"><b>Total Rents:</b>
          {{ $girlfriend->rents->where('status','completed')->count() }}
        </li>
      </ul>
    </div>
  </div>
</div><!-- body-components-container -->
@endsection

@section('scripts')
  <script src="/js/user/rent.js"></script>
  <script type="text/javascript" src="/js/user/rent_girlfriend.js"></script>
@endsection