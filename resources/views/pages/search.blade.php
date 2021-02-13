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
      <h4 class="header-font">Search Girlfriend:</h4>
    </li>
    <li class="collection-item">
      <form id="search-girlfriend-form" autocomplete="off">
        <label><i class="fa fa-search"></i> Search Username:</label>
        <input type="text" name="girlfriend" id="girlfriend" required="required" placeholder="Enter Girlfriend Usename">
        <button type="submit" class="btn btn-flat blue lighten-1 waves-effect waves-light white-text view-rent-btn">
          <i class="fa fa-search"></i> Search
        </button>
      </form>
    </li>
  </ul>
  <div class="row" id="searched-girlfriend-container">
  <!-- ============= APPEND HERE =============== -->
  </div>
</div>
@endsection

@section('scripts')
  <script type="text/javascript" src="/js/admin/girlfriend.js"></script>
  <script type="text/javascript" src="/js/girlfriend/searchgirlfriend.js"></script>
@endsection