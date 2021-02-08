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
  <div class="col l4 m8 offset-m2 s10 offset-s1">
    <div class="profile-image-container">
      <img src="images/avatar.jpg">
      <button class="btn btn-flat green lighten-1 white-text change-profile-btn waves-effect waves-light modal-trigger" href="#edit-gf-account">
        Update account
      </button>
    </div>
    <hr>
  </div>

  <div id="edit-gf-account" class="modal modal-fixed-footer">
    <form>
      <div class="modal-content">
        <h4>Update Account</h4>
        <div class="row">
          <div class="input-field col s6">
            <label for="username" class="active">Username</label>
            <input id="username" type="text" class="validate" name="username" placeholder="Enter Username" value="{{ $girlfriend->username }}">
          </div>
          <div class="input-field col s6">
            <label for="rate" class="active">Rate $$</label>
            <input id="rate" type="number" class="validate" name="rate" placeholder="Enter Rate $$" value="{{ $girlfriend->rate }}">
          </div>
          <label for="description">Girlfriend Description</label>
          <div class="input-field col s12">
            <textarea id="description" class="materialize-textarea" name="description">
              {{ $girlfriend->description }}
            </textarea>
          </div>
          <div class="input-field col s12">
            <label class="active">Tags</label>
            <div class="chips tag-chips"></div> 
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="modal-action modal-close waves-effect waves-light white-text red btn-flat ">Cancel</button>
        <button type="submit" class="waves-effect waves-light green white-text btn-flat ">Save</button>
      </div>  
    </form>
  </div>

  <div class="col l8 m12 s12">
    <div class="row">
      <div class="col s12">
        <ul class="tabs">
          <li class="tab col s6"><a href="#test1">Profile</a></li>
          <li class="tab col s6"><a href="#test2">Requests</a></li>
        </ul>
      </div>
      <div id="test1" class="col s12">
        <ul class="collection with-header">
          <li class="collection-header">
            <h4 class="profile-header">{{ $girlfriend->username }}</h4>
          </li>
          <li class="collection-item">Rate <br> <b>${{ $girlfriend->rate }}.00</b></li>
          <li class="collection-item">Description <br> <b>{!! $girlfriend->description !!}</b></li>
        </ul>
      </div>
      <div id="test2" class="col s12">
        <ul class="collection with-header">
          <li class="collection-header">
            <h4>Requests</h4><br>
          </li>
          @foreach($girlfriend->rents()->get() as $rent)
            <li class="collection-item avatar">
              <img src="images/avatar.png" alt="" class="circle">
              <span class="title"><b>{{ $rent->user->firstname }} {{ $rent->user->lastname }}</b></span>
              <p>{{ $rent->user->email }}<br>
              </p>
              <div class="secondary-content">
                <button class="btn btn-flat green lighten-1 waves-effect waves-light white-text">
                  <i class="fa fa-check"></i>
                </button>
                <button class="btn btn-flat red lighten-1 waves-effect waves-light white-text">
                  <i class="fa fa-times"></i>
                </button>
              </div>
            </li>
          @endforeach
          <li>
            <button class="btn btn-flat blue lighten-1 waves-effect waves-light white-text" style="width:100%">
              Load more
            </button>
          </li>
        </ul>
      </div>
    </div>
    
  </div>
</div><!-- body-components-container -->
@endsection

@section('scripts')
  <script src="/js/tinymce.min.js"></script>  
  <script>
    $('.chips').material_chip();
    tinymce.init({
      selector:'textarea',
      height:250,
      width:'100%',
      theme:'modern',
      skin:'lightgray',
      resize:false,
      plugins: "link image code fullscreen paste",
    });
  </script>
  <script src="/js/admin/edit-gf-account.js"></script>
@endsection