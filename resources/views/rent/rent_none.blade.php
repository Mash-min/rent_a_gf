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

<div class="row body-components-container center">
  <div class="card col l4 m6 s12 offset-l4 offset-m3" style="margin-top:250px;">
    <h4>Go <a href="{{route('rent')}}">rent</a> one first <i class="fa fa-heart"></i></h4>
  </div>
</div>
@endsection

@section('scripts')
  <script src="/js/tinymce.min.js"></script>
  <script src="/js/admin.js"></script>
  <script>
    $('.chips').material_chip();
    tinymce.init({
      selector:'textarea',
      height:250,
      width:'100%',
      theme:'modern',
      resize:false,
      plugins: "link image code fullscreen paste",
    });
  </script>
@endsection