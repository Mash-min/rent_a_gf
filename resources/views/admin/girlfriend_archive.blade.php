@extends('layouts.admin')

@section('content')
<div class="row dashboard-card-table">
  <div class="col s12 ">
    <ul class="tabs center">
      <li class="tab col s5 offset-s1"><a href="#table1"><i class="fa fa-list"></i> Girlfriend archives</a></li>
      <li class="tab col s5"><a href="#table2"><i class="fa fa-search"></i> Search Archive</a></li>
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
      <tbody id="girlfriend-archive-tb">
      </tbody>
    </table>

    <div class="view-more-btn-container">
      <button class="btn btn-flat waves-effect waves-light blue lighten-1 white-text" id="view-more-archive-btn">
        <i class="fa fa-chevron-down"></i>
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
@endsection

@section('scripts')
<script src="/js/tinymce.min.js"></script>
<script src="/js/admin/girlfriend.js"></script>
<script src='/js/admin/girlfriend_archive.js'></script>
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