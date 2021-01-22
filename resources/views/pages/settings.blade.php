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
  <div class="col l4 m5 s10 offset-s1">
    <div class="profile-image-container">
      <img src="images/avatar.jpg">
      <a class="btn btn-flat blue lighten-1 white-text change-profile-btn waves-effect waves-light modal-trigger"  href="#edit-profile-image-modal">
        <i class="fa fa-camera"></i>
      </a>
    </div>
  </div>

  <div id="edit-profile-image-modal" class="modal modal-fixed-footer">
    <form>
      {{ @csrf_field() }}
      <div class="modal-content">
        <h4 class="center">Change profile image</h4>
        <div class="edit-image-container center">
          <img src="images/avatar.jpg">
        </div>
        <div class="file-field input-field">
          <div class="btn btn-flat waves-effect waves-light blue lighten-1 white-text">
            <span>Image</span>
            <input type="file">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a class="modal-action modal-close waves-effect waves-light btn-flat green white-text save-changes">
          Save changes
        </a>
      </div>  
    </form>
  </div>

  <div class="col l8 m7 s12">
    <form method="POST" action="{{ route('update-user') }}">
      {{ @csrf_field() }}
      <ul class="collection with-header">
        <li class="collection-header">
          <h4>Settings</h4>
        </li>
        <li class="collection-item">
          <div class="input-field">
            <label>Firstname</label>
            <input type="text" name="firstname" value="{{ auth()->user()->firstname }}">
          </div>
        </li>
        <li class="collection-item">
          <div class="input-field">
            <label>Lastname</label>
            <input type="text" name="lastname" value="{{ auth()->user()->lastname }}">
          </div>
        </li>
        <li class="collection-item">
          <div class="input-field">
            <label>Email</label>
            <input type="email" name="email"  value="{{ auth()->user()->email }}">
          </div>
        </li>
        <li class="collection-item">
          <div class="input-field">
            <textarea id="bio" class="materialize-textarea" name="bio">rem Ipsum ay ginagamit na modelo ng industriya ng pagpriprint at pagtytypeset. Ang Lorem Ipsum ang naging regular na modelo simula pa noong 1500s, noong may isang di kilalang manlilimbag and kumuha ng galley ng type at ginulo ang pagkaka-ayos nito upang
            </textarea>
            <label for="bio">Bio</label>
          </div>
        </li>
        <li class="collection-item">
          <div class="input-field">
            <label>Contact</label>
            <input type="number" name="contact" value="{{ auth()->user()->contact }}">
          </div>
        </li>
        <li class="collection-item">
          <div class="input-field">
            <label>Birthdate</label>
            <input type="text" class="datepicker" value="{{ auth()->user()->birthdate }}">
          </div>
        </li>
        <li>
          <button class="btn btn-flat green white-text waves-effect waves-light save-changes" type="submit">
            save changes
          </button>
        </li>
      </ul>  
    </form>
  </div>
</div><!-- body-components-container -->
@endsection