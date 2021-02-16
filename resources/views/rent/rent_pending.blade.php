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

<div class="body-components-container">
  <ul class="collection with-header">
    <li class="collection-header page-title avatar"><h4>My rent</h4></li>
    <li class="collection-item"><b>Username:</b> {{ $girlfriend->username }}</li>
    <li class="collection-item"><b>Email:</b> {{ $girlfriend->user->email }}</li>
    <li class="collection-item">
      @foreach($girlfriend->tags()->get() as $tag)
        <div class="chip grey darken-2">
          <i class="fa fa-tag white-text"></i> <a href="" class="white-text">{{ $tag->tag }}</a>
        </div>
      @endforeach
    </li>
    <li class="collection-item"><b>Rate:</b> ${{ $girlfriend->rate }}.00</li>
    <li class="collection-item"><b>Description:</b> {!! $girlfriend->description !!}</li>
    <li class="collection-item"><b>Status:</b> 
      Requested <i class="fa fa-circle grey-text"></i>
    </li>
    <li class="collection-item">
      <button class="btn btn-flat red lighten-1 white-text waves-effect waves-light max-width">Cancel Rent</button>
    </li>
  </ul>
</div><!-- body-components-container -->

@endsection

@section('scripts')

@endsection