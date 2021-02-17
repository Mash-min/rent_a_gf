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
  <div class="col l4 m5 s10 offset-s1">
    <ul class="collection with-header">
      <li class="collection-item">
        <div class="profile-image-container">
          @if(auth()->user()->image == 'no-image.jpg')
            <img src="images/avatar.jpg" class="max-width circle">
          @else
            <img src="/storage/images/profiles/{{ auth()->user()->image }}" class="max-width circle">
          @endif
        </div>
      </li>
      <li class="collection-item">
        <a class="btn btn-flat green lighten-1 white-text waves-effect waves-light modal-trigger"  href="#edit-profile-image-modal" style="width: 100%">
          Change photo
        </a>
      </li>
      <li class="collection-item center">
        <button class="btn btn-flat blue lighten-1 white-text waves-effect waves-light" onclick="resetPassword()" style="width: 100%">
          Reset password
        </button>
      </li>
    </ul>
  </div>

  <div id="edit-profile-image-modal" class="modal modal-fixed-footer">
    <form id="updateImageForm">
      {{ @csrf_field() }}
      <div class="modal-content">
        <h4 class="center">Change profile image</h4>
        <div class="edit-image-container center">
          @if(auth()->user()->image == 'no-image.jpg')
            <img src="images/avatar.jpg" class="max-width">
          @else
            <img src="/storage/images/profiles/{{ auth()->user()->image }}" class="max-width">
          @endif
        </div>
        <div class="file-field input-field">
          <div class="btn btn-flat waves-effect waves-light blue lighten-1 white-text">
            <span>Image</span>
            <input type="file" name="image" id="image">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="waves-effect waves-light btn-flat red white-text save-changes modal-close" type="button">
          cancel
        </button>
        <button class="waves-effect waves-light btn-flat blue white-text save-changes" type="submit">
          Save changes
        </button>
      </div>  
    </form>
  </div>

  <div class="col l8 m7 s12">
    <form method="POST" action="{{ route('update-user') }}">
      {{ @csrf_field() }}
      <ul class="collection with-header">
        <li class="collection-header center">
          <h4>Account settings</h4>
        </li>
        <li class="collection-item">
          @error('firstname')
          <div class="chip red darken-1 white-text">
            {{ $message }}
          </div>
          @enderror
          <div class="input-field">
            <label><i class="fa fa-pencil"></i> Firstname</label>
            <input type="text" name="firstname" value="{{ auth()->user()->firstname }}">
          </div>
        </li>
        <li class="collection-item">
          @error('lastname')
          <div class="chip red darken-1 white-text">
            {{ $message }}
          </div>
          @enderror
          <div class="input-field">
            <label><i class="fa fa-pencil"></i> Lastname</label>
            <input type="text" name="lastname" value="{{ auth()->user()->lastname }}">
          </div>
        </li>
        <li class="collection-item">
          @error('email')
          <div class="chip red darken-1 white-text">
            {{ $message }}
          </div>
          @enderror
          <div class="input-field">
            <label><i class="fa fa-pencil"></i> Email</label>
            <input type="email" name="email"  value="{{ auth()->user()->email }}">
          </div>
        </li>
        <li class="collection-item">
          <div class="input-field">
            <label><i class="fa fa-pencil"></i> Bio</label>
            <textarea id="bio" class="materialize-textarea" name="bio">{{ auth()->user()->bio }}</textarea>
          </div>
        </li>
        <li class="collection-item">
          @error('address')
          <div class="chip red darken-1 white-text">
            {{ $message }}
          </div>
          @enderror
          <div class="input-field">
            <label><i class="fa fa-pencil"></i> Address</label>
            <input type="text" name="address" value="{{ auth()->user()->address }}">
          </div>
        </li>
        <li class="collection-item">
          @error('contact')
          <div class="chip red darken-1 white-text">
            {{ $message }}
          </div>
          @enderror
          <div class="input-field">
            <label><i class="fa fa-pencil"></i> Contact</label>
            <input type="number" name="contact" value="{{ auth()->user()->contact }}">
          </div>
        </li>
        <li class="collection-item">
          <div class="input-field">
            <label><i class="fa fa-pencil"></i> Birthdate</label>
            <input type="text" class="datepicker" value="{{ auth()->user()->birthdate }}" name="birthdate">
          </div>
        </li>
        <li class="collection-item">
          <button class="btn btn-flat blue white-text waves-effect waves-light save-changes" type="submit" style="width: 100%">
            save
          </button>
        </li>
      </ul>  
    </form>
  </div>
</div><!-- body-components-container -->
@endsection

@section('scripts')
  <script type="text/javascript" src="{{ asset('js/user/user_update.js') }}"></script>
@endsection