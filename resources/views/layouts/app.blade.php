<!DOCTYPE html>
<html>
<head>
	<title>Rent a GIRLFRIEND</title>
	<link rel="stylesheet" type="text/css" href="/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
	<ul id="slide-out" class="side-nav fixed">
		<li>
			<div class="user-view">
	      <div class="background">
	        <img src="/images/cover1.jpg">
	      </div>
	      <a href="/"><img class="circle" src="/images/avatar.png"></a>
	      <a><span class="white-text name">Rent A girlfriend</span></a>
	      <a><span class="white-text email">Join us and rent your girlfriend now</span></a>
    	</div>
    </li>
    <li class="no-padding">
      <ul class="collapsible collapsible-accordion">
      	<li>
      		 <a href="{{ route('index') }}"><i class="fa fa-home fa-3"></i> Home</a>
      	</li>
      	@auth
          @if(auth()->user()->role == 'admin')
            <li>
               <a href="{{ route('dashboard') }}"><i class="fa fa-list fa-3"></i> Admin Panel</a>
            </li>
          @endif
      	<li class="bold">
      		<a class="collapsible-header waves-effect waves-teal">
      		  <i class="fa fa-sort-desc"></i>Account
      		</a>
          <div class="collapsible-body">
            <ul>
              <li><a href="{{ route('profile') }}">Profile <i class="fa fa-user black-text"></i></a></li>
              <li><a href="{{ route('settings') }}">Settings<i class="fa fa-gear black-text"></i></a></li>
              <li><a href="{{ route('girlfriend') }}">My girlfriend <i class="fa fa-heart black-text"></i></a></li>
              <li><a href="#!" onclick="logout()">Logout <i class="fa fa-sign-out"></i></a></li>
              <form id="logout-form" action="{{ route('logout-user') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </ul>
          </div>
        </li>
        @endauth
        <li class="bold">
        	<a class="collapsible-header waves-effect waves-teal">
      		  <i class="fa fa-sort-desc"></i>Girlfriend
      		</a>
          <div class="collapsible-body">
            <ul>
              <li><a href="{{ route('rent') }}">Rent <i class="fa fa-money black-text"></i></a></li>
              <li><a href="{{ route('tags') }}">Tags <i class="fa fa-tag black-text"></i></a></li>
              <li><a href="{{ route('search') }}">Search Girlfriend <i class="fa fa-search black-text"></i></a></li>
              @auth
                @if(!auth()->user()->alreadyRegisteredGirlfriend())
                  <li><a href="{{ route('apply') }}">Apply as a girlfriend <i class="fa fa-sign-in"></i></a></li>
                @endif
              @endauth
            </ul>
          </div>
        </li>
        @guest
        <li class="bold">
        	<a class="collapsible-header waves-effect waves-teal">
      		  <i class="fa fa-sort-desc"></i>Join Us
      		</a>
          <div class="collapsible-body">
            <ul>
              <li><a href="{{ route('register') }}">Register <i class="fa fa-sign-in"></i></a></li>
              <li><a href="{{ route('login') }}">Login <i class="fa fa-sign-in"></i></a></li>
            </ul>
          </div>
        </li>
        @endguest
      </ul>
    </li>
  </ul><!-- sidenav -->
 
  <div class="body-container">
  	@yield('content')
  </div>
</body>
	<script src="/js/jquery-3.2.1.min.js"></script>
	<script src="/js/materialize.min.js"></script>
  <script src="/js/sweetalert.min.js"></script>
	<script src="/js/app.js"></script>
  @yield('scripts')
</html>