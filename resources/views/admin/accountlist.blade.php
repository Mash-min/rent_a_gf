@extends('layouts.admin')

@section('content')
<div class="row dashboard-card-table">
  <div class="col s12 ">
    <ul class="tabs center">
      <li class="tab col s5 offset-s1"><a href="#table1"><i class="fa fa-list"></i> Account List</a></li>
      <li class="tab col s5"><a href="#table2"><i class="fa fa-search"></i> Search Account</a></li>
    </ul>
  </div>
  <!-- ================= TABLE 1 =================== -->
  <div id="table1" class="col s12">
    <table class="bordered striped centered highlight responsive-table" id="account-list-table">
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
          <th>Contact</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody id="account-tb">
      </tbody>
    </table>
    <div class="view-more-btn-container">
      <button class="btn btn-flat waves-effect waves-light blue lighten-1 white-text" id="view-more-account-btn">
        View more
      </button>
    </div>
  </div>
  <!-- ================= TABLE 1 =================== -->

  <!-- ================= TABLE 2 =================== -->
  <div id="table2" class="col s12">
    <form id="search-account-form" autocomplete="off">
      <div class="input-field">
        <label><i class="fa fa-search"></i> Seach Account</label>
        <input type="text" name="search" id="search-account-input" required="">
      </div>
      <button class="btn btn-flat waves-effect waves-light blue lighten-1 white-text" id="search-gf-btn">
        <i class="fa fa-search"></i> Search
      </button>  
    </form>
    
    <table class="bordered striped centered highlight responsive-table" id="searched-account-list-table">
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
          <th>Contact</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody id="searched-account-tb">
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
<script type="text/javascript" src="/js/app.js"></script>
<script type="text/javascript" src="/js/admin/account.js"></script>
<script type="text/javascript" src="/js/admin/accountlist.js"></script>
@endsection