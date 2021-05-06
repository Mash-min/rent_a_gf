<!DOCTYPE html>
<html>
<head>
  <title>Rent a Girlfriend</title>
  <meta name="viewport" content="width=device-width, initial-scale=0.86, maximum-scale=5.0, minimum-scale=0.86">
  <link rel="stylesheet" type="text/css" href="/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body style="background-color: white">
  <div class="cover">
  </div>
  <nav class="index-nav">
    <div class="nav-wrapper container">
      <a href="{{ route('index') }}" class="brand-logo">Rent a Girlfriend</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars"></i></a>
      <ul class="right hide-on-med-and-down">
        @auth
          <li>
            <a href="{{ route('profile') }}">
              {{ Auth::user()->firstname }}
            </a>
          </li>
        @endauth

        @guest
          <li><a href="{{ route('login') }}">Login</a></li>
          <li><a href="{{ route('register') }}">Register</a></li>
        @endguest
      </ul>
      <ul class="side-nav" id="mobile-demo">
        @auth
          <li>
            <a href="{{ route('profile') }}">
              {{ Auth::user()->firstname }}
            </a>
          </li>
        @endauth
        
        @guest
          <li><a href="{{ route('login') }}">Login</a></li>
          <li><a href="{{ route('register') }}">Register</a></li>
        @endguest
      </ul>
    </div>
  </nav>
  <div class="get-started-container row">
    <div class="col l6 m8 offset-m2 s12 center white-text" style="margin-bottom: 30px;">
      <h3 class="page-title">Find your Girlfriend now!</h3>
      <b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</b>
    </div>
    <div class="col l6 m8 offset-m2 s12 center">
      <a href="{{ route('rent') }}" class="btn btn-flat btn-large white-text waves-effect waves-light red accent-3">
        Get Started
      </a>
    </div>
  </div>
  <div class="row dummy-text-container container">
    <div class="col s12 m4 l4 center">
      <h4 class="page-title">Find a Girlfriend</h4>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    </div>
    <div class="col s12 m4 l4 center">
      <h4 class="page-title">Be the Girlfriend</h4>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    </div>
    <div class="col s12 m4 l4 center">
      <h4 class="page-title">Single no more</h4>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    </div>
  </div>
  <footer class="page-footer index-footer blue">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Footer Content</h5>
          <p class="grey-text text-lighten-4">
            This project is only made for research and case study purposes. All resources used for this project are all free source.
          </p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Links</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Twitter</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Instagram</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Github</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright blue darken-4">
      <div class="container center">
      © 2021 Rent a Girlfriend
      </div>
    </div>
  </footer>
</body>
  <script src="/js/jquery-3.2.1.min.js"></script>
  <script src="/js/materialize.min.js"></script>
  <script src="/js/sweetalert.min.js"></script>
  <script src="/js/app.js"></script>
</html>