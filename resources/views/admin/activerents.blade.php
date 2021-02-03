@extends('layouts.admin')

@section('content')
	<div class="table-container dashboard-card-table">
	  <h4 style="margin-left:10px;">Active Rents</h4>
	  <table class="bordered centered highlight">
	    <thead>
	      <tr>
	        <th>View</th>
	        <th>Client name</th>
	        <th>Girlfriend name</th>
	        <th>Price</th>
	        <th>Status</th>
	        <th>Options</th>
	      </tr>
	    </thead>

	    <tbody id="active-rents-row">
	    </tbody>
	  </table>
	  <div class="view-more-btn-container">
	    <button class="btn btn-flat waves-effect waves-light blue lighten-1 white-text">View more</button>
	  </div>
	</div>
@endsection

@section('scripts')
	<script src="/js/admin/rent.js"></script>
	<script src="/js/admin/activerents.js"></script>
@endsection