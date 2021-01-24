@extends('layouts.admin')

@section('content')
<style type="text/css">
  body {
    background-color: white;
  }
</style>
<div class="table-container">
  <table id="table_id" class="display">
    <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
          <th>Contact</th>
          <th>Username</th>
          <th>Status</th>
        </tr>
    </thead>
    <tbody>
      
    </tbody>
  </table>  
</div>
@endsection

@section('scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script src="/js/admin/girlfriendlist.js"></script>
@endsection