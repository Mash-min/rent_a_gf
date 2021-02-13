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
  <h4 class="header-font">{{ $girlfriend->username }}</h4>
</div><!-- body-components-container -->
@endsection

@section('scripts')
  <script type="text/javascript" src="/js/rent.js"></script>
@endsection