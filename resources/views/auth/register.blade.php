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

<div class="row body-components-container">
  <div class="row center">
    <div class="col l8 offset-l2  m8 offset-m2 s12 form-container">
      <form method="POST" action="{{ route('register-user') }}" autocomplete="off">
        {{ @csrf_field() }}
        <ul class="collection with-header">
          <li class="collection-header"><h4>Login</h4></li>
          @error('firstname')
            <li class="collection-item red white-text">
             {{ $message }}
            </li>
          @enderror
          <li class="collection-item">
            <div class="input-field">
              <input id="firstname" type="text" class="validate" name="firstname" placeholder="Enter your firstname">
              <label for="firstname"><i class="fa fa-pencil"></i> Firstname</label>
            </div>
          </li>
          @error('lastname')
            <li class="collection-item red white-text">
             {{ $message }}
            </li>
          @enderror
          <li class="collection-item">
            <div class="input-field">
              <input id="lastname" type="text" class="validate" name="lastname" placeholder="Enter your Lastname">
              <label for="lastname"><i class="fa fa-pencil"></i> Lastname</label>
            </div>
          </li>
          @error('contact')
            <li class="collection-item red white-text">
             {{ $message }}
            </li>
          @enderror
          <li class="collection-item">
            <div class="input-field">
              <input id="contact" type="number" class="validate" name="contact" placeholder="Enter your Contact number">
              <label for="contact"><i class="fa fa-phone"></i> Contact Numbers</label>
            </div>
          </li>
          @error('email')
            <li class="collection-item red white-text">
             {{ $message }}
            </li>
          @enderror
          <li class="collection-item">
            <div class="input-field">
              <input id="email" type="email" class="validate" name="email" placeholder="Enter your Email">
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
            </div>
          </li>
          @error('birthdate')
            <li class="collection-item red white-text">
             {{ $message }}
            </li>
          @enderror
          <li class="collection-item">
            <div class="input-field">
            <input type="text" class="datepicker" name="birthdate" placeholder="Select your birthdate">
            <label for="birthdate"><i class="fa fa-calendar"></i> Birthdate</label>
            </div>
          </li>
          @error('password')
            <li class="collection-item red white-text">
             {{ $message }}
            </li>
          @enderror
          <li class="collection-item">
            <div class="input-field">
              <input id="password" type="password" class="validate" name="password" placeholder="Enter your password">
              <label for="password"><i class="fa fa-lock"></i> Password</label>
            </div>
          </li>
          @error('password_confirmation')
            <li class="collection-item red white-text">
             {{ $message }}
            </li>
          @enderror
          <li class="collection-item">
            <div class="input-field">
              <input id="password_confirmation" type="password" class="validate" name="password_confirmation" placeholder="Re-Enter your firstname">
              <label for="password_confirmation"><i class="fa fa-lock"></i> Password password</label>
            </div>
          </li>
          <li class="collection-item">
            <button class="btn btn-flat blue lighten-1 waves-effect waves-light white-text" style="width:100%" type="submit">
              Register
            </button>
          </li>
        </ul>  
      </form>
    </div>  
  </div>
</div><!-- body-components-container -->	
@endsection