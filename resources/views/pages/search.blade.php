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
  <h4 class="header-font">Search:</h4>
  <div class="search-form-container">
    <form id="search-girlfriend-form" autocomplete="off">
      <label><i class="fa fa-search"></i> Search Username:</label>
      <input type="text" name="girlfriend" id="girlfriend" required="required">
      <button type="submit" class="btn btn-flat blue lighten-1 waves-effect waves-light white-text view-rent-btn">
        Search
      </button>
    </form>
  </div>
  <div class="row" id="searched-girlfriend-container">
  </div>
  <!-- <div class="view-more-container">
    <button class="btn btn-flat green lighten-1 waves-effect waves-light white-text view-rent-btn">
      view more
    </button>
  </div> -->
</div>
@endsection

@section('scripts')
  <script type="text/javascript" src="/js/admin/girlfriend.js"></script>
  <script type="text/javascript" src="/js/searchgirlfriend.js"></script>
@endsection