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
    <div class="card col s12 l8 offset-l2 m12 form-container">
      <form method="POST" action="{{ route('register-user') }}">
        {{ @csrf_field() }}
        <div class="card-content">
          <h4 class="header-font">Register</h4>
          <div class="row">
            <div class="input-field col l6  m6 s12">
              <input id="firstname" type="text" class="validate" name="firstname">
              <label for="firstname">Firstname</label>
            </div>
            <div class="input-field col l6 m6 s12">
              <input id="lastname" type="text" class="validate" name="lastname">
              <label for="lastname">Lastname</label>
            </div>
            <div class="input-field col l6 m6 s12">
              <input id="contact" type="number" class="validate" name="contact">
              <label for="contact">Contact #</label>
            </div>
            <div class="input-field col l6 m6 s12">
              <input id="email" type="email" class="validate" name="email">
              <label for="email">Email</label>
            </div>
            <div class="input-field col s12">
            <input type="text" class="validate" name="address">
              <label for="address">Address</label>
            </div>
            <div class="input-field col s12">
            <input type="text" class="datepicker" name="birthdate">
              <label for="birthdate">Birthdate</label>
            </div>
            <div class="input-field col s12">
              <input id="password" type="password" class="validate" name="password">
              <label for="password">Password</label>
            </div>
            <div class="input-field col s12">
              <input id="password_confirmation" type="password" class="validate" name="password_confirmation">
              <label for="password_confirmation">Password confirmation</label>
            </div>
          </div>
        </div>
        <div class="card-action">
          <button class="btn btn-flat green lighten-1 waves-effect waves-light white-text" style="width:100%" type="submit">
            Submit
          </button>
        </div> 
      </form>
    </div>  
  </div>
</div><!-- body-components-container -->	
@endsection