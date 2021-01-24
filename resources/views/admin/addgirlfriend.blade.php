@extends('layouts.admin')

@section('content')
<div class="card dashboard-card">
  <div class="card-content">
  <h4>Add Girlfriend</h4>
    <form id="add-girlfriend-form">
    	{{ @csrf_field() }}
      <div class="row">
        <div class="input-field col s6">
          <input id="username" type="text" class="validate" name="username">
          <label for="username">Username</label>
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
          <input type="text" id="girlfriend">
          <input type="hidden" name="user_id" id="user_id" value="">
          <label for="girlfriend"><i class="fa fa-search"></i> Please search a User</label>
        </div>
        <div class="collection" id="user-results">
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
@endsection

@section('scripts')
  <script src="/js/app.js"></script>
  <script src="/js/tinymce.min.js"></script>
  <script src="/js/admin.js"></script>
  <script src="/js/admin/addgirlfriend.js"></script>
@endsection