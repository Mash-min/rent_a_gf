@extends('layouts.app')

@section('content')
<nav class="red lighten-1">
  <div class="nav-wrapper container">
    <a href="#" data-activates="slide-out" class="button-collapse">
    	<i class="fa fa-bars"></i>
    </a>
  </div>
</nav><!-- navbar -->

<div class="row body-components-container">
  <div class="row center">
    <div class="card col s6 offset-s3 form-container">
      <form method="POST" action="{{ route('login-user') }}">
         <div class="card-content">
          {{ @csrf_field() }}
          <h4 class="header-font">Login</h4>
          <div class="row">
            <div class="input-field col s12">
              <i class="fa fa-envelope prefix"></i>
              <input id="email" type="email" class="validate" name="email">
              <label for="email">Email</label>
            </div>
            <div class="input-field col s12">
              <i class="fa fa-lock prefix"></i>
              <input id="password" type="password" class="validate" name="password">
              <label for="password">Password</label>
            </div>
            <p>
              <input type="checkbox" id="test5" name="remember_me" />
              <label for="test5">Remember me</label>
            </p>
          </div>
        </div>
        <div class="card-action">
          <button class="btn btn-flat green lighten-1 waves-effect waves-light white-text">
            Submit
          </button>
        </div> 
      </form>
    </div>  
  </div>
</div><!-- body-components-container -->
@endsection