@extends('layouts.app')

@section('content')
{{ @csrf_field() }}
<nav class="blue lighten-1">
  <div class="nav-wrapper container">
    <a href="#!" class="brand-logo center">Rent a Girlfriend</a>
    <a href="#" data-activates="slide-out" class="button-collapse">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</nav><!-- navbar -->

<div class="row body-components-container">
  <div class="col s12">
    <ul class="collection with-header">
      <li class="collection-header">
        <h4>Notifications</h4>
      </li>
      <div class="notification-container">
        <!-- ======= APPEND HERE ========= -->
      </div>
    </ul>
  </div>
</div><!-- body-components-container -->
@endsection

@section('scripts')
  <script src="/js/user/notification.js"></script>
@endsection