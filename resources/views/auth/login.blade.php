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
    <div class="col l6 offset-l3 m8 offset-m2 s12 form-container">
      <form method="POST" action="{{ route('login-user') }}" autocomplete="off">
        {{ @csrf_field() }}
        <ul class="collection with-header">
          <li class="collection-header"><h4>Login</h4></li>
          @if(session('status'))
            <li class="collection-item red white-text error-item">
              {{ session('status') }}
              <a href="#" class="secondary-content" onclick="$('.error-item').remove()"><i class="fa fa-times white-text"></i></a>
            </li>
          @endif
          <li class="collection-item">
            <div class="input-field">
              <input id="email" type="email" class="validate" name="email" placeholder="Enter your Email">
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
            </div>
          </li>
          <li class="collection-item">
            <div class="input-field">
              <input id="password" type="password" class="validate" name="password" placeholder="Enter your password">
              <label for="pasword"><i class="fa fa-lock"></i> Password</label>
            </div>
            <p>
              <input type="checkbox" id="test5" name="remember_me" />
              <label for="test5">Remember me</label>
            </p>
          </li>
          <li class="collection-item">
            <button class="btn btn-flat blue lighten-1 waves-effect waves-light white-text" style="width:100%">
              Login
            </button>
          </li>
        </ul>  
      </form>
    </div>  
  </div>
</div><!-- body-components-container -->
@endsection