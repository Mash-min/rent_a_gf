@extends('layouts.admin')

@section('content')
{{ @csrf_field() }}
<div class="table-container dashboard-card-table">
  <h4 style="margin-left:10px;">Requests</h4>
  <table class="bordered centered highlight">
    <thead>
      <tr>
        <th>View</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Username</th>
        <th>Options</th>
      </tr>
    </thead>

    <tbody id="girlfriend-requests-row">
      
    </tbody>
  </table>
  <div class="view-more-btn-container">
    <button class="btn btn-flat waves-effect waves-light blue lighten-1 white-text">View more</button>
  </div>
</div>
@endsection

@section('scripts')
  <script src="/js/app.js"></script>
  <script src="/js/tinymce.min.js"></script>
  <script src="/js/admin.js"></script>
  <script src="/js/admin/girlfriend.js"></script>
  <script src="/js/admin/girlfriendrequests.js"></script>
  <script src="/js/admin/addgirlfriend.js"></script>
@endsection