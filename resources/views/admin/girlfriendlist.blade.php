@extends('layouts.admin')

@section('content')
<div class="table-container dashboard-card-table">
  <h4 style="margin-left:10px;">Girlfriend List</h4>
  <!-- <div class="input-field">
    <label for="girlfriend"><i class="fa fa-search"></i> Search username</label>
    <input type="text" name="search" id="search-gf-input">
  </div>
  <table class="bordered striped centered highlight responsive-table hidden" id="searched-table">
    <thead>
      <tr>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Rate</th>
        <th>Options</th>
      </tr>
    </thead>
    <tbody id="searched-girlfriend-tb">
    </tbody>
  </table> -->
  <table class="bordered striped centered highlight responsive-table" id="girlfriend-list-table">
    <thead>
      <tr>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
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
@endsection

@section('scripts')
<script src="/js/admin/girlfriend.js"></script>
<script src="/js/admin/girlfriendlist.js"></script>
@endsection