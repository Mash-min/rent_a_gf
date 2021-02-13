@extends('layouts.admin')

@section('content')
<div class="row dashboard-card-table">
  <div class="col s12 ">
    <ul class="tabs center">
      <li class="tab col s5 offset-s1"><a href="#table1"><i class="fa fa-list"></i> Girlfriend List</a></li>
      <li class="tab col s5"><a href="#table2"><i class="fa fa-search"></i> Search Girlfriend</a></li>
    </ul>
  </div>
  <!-- ================= TABLE 1 =================== -->
  <div id="table1" class="col s12">
    <table class="centered highlight responsive-table" id="girlfriend-list-table">
      <thead>
        <tr>
          <th>Username</th>
          <th>Email</th>
          <th>Contact</th>
          <th>Rate</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody id="girlfriend-tb">
      </tbody>
    </table>
    <div class="view-more-btn-container">
      <button class="btn btn-flat waves-effect waves-light blue lighten-1 white-text" id="view-more-gf-btn">
        View more
      </button>
    </div>
  </div>
  <!-- ================= TABLE 1 =================== -->

  <!-- ================= TABLE 2 =================== -->
  <div id="table2" class="col s12">
    <form id="search-girlfriend-form" autocomplete="off">
      <div class="input-field">
        <label><i class="fa fa-search"></i> Enter username</label>
        <input type="text" name="search" id="search-gf-input" required="">
      </div>
      <button class="btn btn-flat waves-effect waves-light blue lighten-1 white-text" id="search-gf-btn">
        <i class="fa fa-search"></i> Search
      </button>  
    </form>
    
    <table class="centered highlight responsive-table" id="searched-girlfriend-list-table">
      <thead>
        <tr>
          <th>Username</th>
          <th>Email</th>
          <th>Contact</th>
          <th>Rate</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody id="girlfriend-tb">
      </tbody>
    </table>
    <div class="view-more-btn-container hide">
      <button class="btn btn-flat waves-effect waves-light blue lighten-1 white-text" id="view-more-searched-gf-btn">
        View more
      </button>
    </div>
  </div>
  <!-- ================= TABLE 2 =================== -->
</div>

<!-- ================= EDIT MODAL =================== -->
  <div id="edit-gf-modal" class="modal modal-fixed-footer">
    <form id="edit-gf-form" autocomplete="off">
      <div class="modal-content">
        {{ @csrf_field() }}
        <h4>Edit girlfriend</h4>
        <div class="row">
          <div class="input-field col s6">
            <input id="username" type="text" class="validate active" name="username" placeholder="Enter Username">
            <label for="username">Username</label>
          </div>
          <div class="input-field col s6">
            <input id="rate" type="number" class="validate" name="rate" placeholder="Enter Rate $$">
            <label for="rate">Rate $$</label>
          </div>
          <label for="description">Girlfriend Description</label>
          <div class="input-field col s12">
            <textarea id="description" class="materialize-textarea" name="description"></textarea>
          </div>  
          <input type="hidden" name="user_id" id="user_id" value="" placeholder="Search User">
          <div class="input-field col s12">
            <input type="text" id="girlfriend" name="girlfriend" placeholder="Search User">
            <label for="girlfriend" class="active"><i class="fa fa-search"></i> Please search a User</label>
          </div>
          <div class="collection" id="user-results">
          </div>
          <div class="input-field col s12">
            <label class="active">Tags</label>
            <div class="chips tag-chips edit-tag-chip"></div> 
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-flat red lighten-1 waves-effect waves-light white-text modal-close" type="button">
          Cancel
        </button>
        <button class="btn btn-flat green lighten-1 waves-effect waves-light white-text" type="submit">
          Save
        </button>
      </div>  
    </form>
  </div>
<!-- ================= EDIT MODAL =================== -->

@endsection

@section('scripts')
<script src="/js/tinymce.min.js"></script>
<script src="/js/admin/girlfriend.js"></script>
<script src="/js/admin/girlfriend_list.js"></script>
<script>
  tinymce.init({
    selector:'textarea',
    height:250,
    width:'100%',
    theme:'modern',
    resize:false,
    plugins: "link image code fullscreen paste",
  });
</script>
@endsection