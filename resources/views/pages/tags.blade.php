@extends('layouts.app')

@section('content')
<nav class="blue lighten-1">
  <div class="nav-wrapper container">
    <a href="#!" class="brand-logo right">Rent a Girlfriend</a>
    <a href="#" data-activates="slide-out" class="button-collapse">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</nav><!-- navbar -->
<div class="row body-components-container">
  <ul class="collection with-header">
    <li class="collection-header">
      <h4 class="header-font"><i class="fa fa-tag"></i> Tags:</h4>
    </li>
    <li class="collection-item">
      <div>
        @foreach($tags as $tag)
          <div class="chip grey darken-2">
            <a href="#!" class=" white-text">
              <i class="fa fa-tag"></i> {{ $tag->tag }}
            </a>
          </div>/
        @endforeach
      </div>
    </li>
  </ul>
  <div class="row" id="searched-girlfriend-container">
  <!-- ============= APPEND HERE =============== -->
  </div>
</div>
@endsection

@section('scripts')

@endsection