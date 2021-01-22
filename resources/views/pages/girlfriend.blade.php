@extends('layouts.app')

@section('content')
<nav class="red lighten-1">
  <div class="nav-wrapper container">
    <a href="#!" class="brand-logo right">Username</a>
    <a href="#" data-activates="slide-out" class="button-collapse">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</nav><!-- navbar -->

<div class="body-components-container">
  <h4 class="header-font">Current rented girlfriend</h4>
  <div class="row">
    <div class="col l4 m5 s10 offset-s1">
      <div class="profile-image-container">
        <img src="images/avatar.jpg">
        <button class="btn btn-flat red lighten-1 white-text change-profile-btn waves-effect waves-light">
          Cancel rent
        </button>
      </div>
    </div>
    <div class="col l8 m7 s12">
      <ul class="collection with-header">
        <li class="collection-header">
          <h4 class="profile-header header-font">Mashiyyat Delos Santos</h4><br>
          <div class="chip profile-tag">
            <a href="">Tsundere</a>
          </div>
          <div class="chip profile-tag">
            <a href="">Himouto</a>
          </div>
          <div class="chip profile-tag">
            <a href="">One-san</a>
          </div>
        </li>
        <li class="collection-item">Status <br> <b>Ongoing</b></li>
        <li class="collection-item">Price <br> <b>100$</b></li>
        <li class="collection-item">Schedule <br> <b>January 3, 2021</b></li>
        <li class="collection-item">Contact <br> <b>#09999999999</b></li>
      </ul>
    </div>  
  </div>
  <div class="row">
    <ul class="collection with-header">
      <li class="collection-header"><h4 class="header-font">Previous Rents</h4></li>
      <li class="collection-item avatar">
        <img src="images/avatar.jpg" alt="" class="circle">
        <span class="title"><b>Mashiyyat Delos Santos</b></span>
        <p>Date: January 3, 2021<br>
           Price: 100$
        </p>
        <a href="#!" class="secondary-content"><i class="fa fa-eye"></i></a>
      </li>
      <li class="collection-item avatar">
        <img src="images/avatar.jpg" alt="" class="circle">
        <span class="title"><b>Mashiyyat Delos Santos</b></span>
        <p>Date: January 3, 2021<br>
           Price: 100$
        </p>
        <a href="#!" class="secondary-content"><i class="fa fa-eye"></i></a>
      </li>
      <li class="collection-item">
        <button class="btn btn-flat green lighten-1 white-text change-profile-btn waves-effect waves-light">
          Load more
        </button>
      </li>
    </ul>
  </div>
</div><!-- body-components-container -->
@endsection