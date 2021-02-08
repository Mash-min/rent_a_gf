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
  <h4 class="header-font">Current rented girlfriend</h4>
  <div class="row">
    <div class="col l4 m5 s10 offset-s1">
      <div class="profile-image-container">
        <img src="images/avatar.jpg">
        {{ @csrf_field() }}
        <button class="btn btn-flat red lighten-1 white-text change-profile-btn waves-effect waves-light" onclick="deleteRent('{{ $girlfriend->id }}')">
          Cancel rent
        </button>
      </div>
    </div>
    <div class="col l8 m7 s12">
      <ul class="collection with-header">
        <li class="collection-header">
          <h4 class="profile-header header-font">
            {{ $girlfriend->girlfriend->username }}</h4><br>
          @foreach($girlfriend->girlfriend->tags as $tag)
            <div class="chip profile-tag">
              <a href="">{{$tag->tag}}</a>
            </div>
          @endforeach
        </li>
        <li class="collection-item">Status <br> <b>{{ $girlfriend->status }}</b></li>
        <li class="collection-item">Price <br> <b>${{ $girlfriend->girlfriend->rate }}.00</b></li>
        <li class="collection-item">Contact <br> <b>#{{ $girlfriend->girlfriend->user->contact }}</b></li>
        <li class="collection-item">Email <br> <b>{{ $girlfriend->girlfriend->user->email }}</b></li>
      </ul>
    </div>  
  </div>
  <div class="row">
    <ul class="collection with-header">
      <li class="collection-header"><h4 class="header-font">Previous Rents</h4></li>
      @foreach(auth()->user()->rents()->where('status','=','completed')->get() as $rent)
        <li class="collection-item avatar">
          <img src="images/avatar.jpg" alt="" class="circle">
          <span class="title"><b>{{$rent->girlfriend->username}}</b></span>
          <p>Date: {{$rent->created_at}}<br>
             Price: ${{$rent->girlfriend->rate}}.00
          </p>
          <a href="#!" class="secondary-content"><i class="fa fa-eye"></i></a>
        </li>
      @endforeach
    </ul>
  </div>
</div><!-- body-components-container -->
@endsection

@section('scripts')
  <script type="text/javascript" src="/js/rent.js"></script>
@endsection