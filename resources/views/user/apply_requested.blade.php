@extends('layouts.app')

@section('content')
  <div class="row body-components-container center">
    <h4 class="header-font">Your girlfriend application has been sent. Please wait for approval.</h4>  
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