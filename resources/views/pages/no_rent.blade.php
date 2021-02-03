@extends('layouts.app')

@section('content')

<div class="row body-components-container">
  <h4 class="header-font">You dont have any rented girlfriend yet.. :v, Go <a href="{{route('rent')}}">Rent</a> one first :)</h4>
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