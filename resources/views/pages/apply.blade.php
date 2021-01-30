@extends('layouts.app')

@section('content')

<div class="row body-components-container">
  <div class="card dashboard-card">
    <div class="card-content">
    <h4>Apply as Girlfriend</h4>
      <form id="apply-girlfriend-form" autocomplete="off">
        {{ @csrf_field() }}
        <div class="row">
          <div class="input-field col s6">
            <label for="username" class="active">Username</label>
            <input id="username" type="text" class="validate" name="username" placeholder="Enter Username">
          </div>
          <div class="input-field col s6">
            <input id="rate" type="number" class="validate" name="rate">
            <label for="rate">Rate $$</label>
          </div>
          <label for="description">Girlfriend Description</label>
          <div class="input-field col s12">
            <textarea id="description" class="materialize-textarea" name="description"></textarea>
          </div>  
          <div class="input-field col s12">
            <label class="active">Tags</label>
            <div class="chips tag-chips"></div> 
          </div>
        </div>
        <button class="btn btn-flat blue lighten-1 white-text waves-light waves-effect" style="width:100%" type="submit">
          Save
        </button>
      </form>
    </div>
  </div>  
</div>
@endsection

@section('scripts')
  <script src="/js/tinymce.min.js"></script>
  <script src="/js/admin.js"></script>
  <script src="/js/admin/apply.js"></script>
@endsection