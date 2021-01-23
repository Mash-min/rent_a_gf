@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col l4">
    <div class="card dashboard-card">
      <div class="card-content row">
        <div class="col s6 user-count">
          <span>{{ $users->count() }}</span> <br>Users
        </div>
        <div class="col s6">
          <i class="fa fa-user fa-3x"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="col l4">
    <div class="card dashboard-card">
      <div class="card-content row">
        <div class="col s6 user-count">
          <span>200</span> <br>Rents
        </div>
        <div class="col s6">
          <i class="fa fa-shopping-cart fa-3x"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="col l4">
    <div class="card dashboard-card">
      <div class="card-content row">
        <div class="col s6 user-count">
          <span>100</span> <br>Girlfriends
        </div>
        <div class="col s6">
          <i class="fa fa-female fa-3x"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="col l12">
    <div class="card top-girlfriend">
      <div class="card-content row" style="padding:5px">
        <ul class="collection with-header">
          <li class="collection-header"><h4>Top Girlfriends</h4></li>
          <li class="collection-item"><b>Alvin Eclair</b>
            <span class="new badge blue lighten-1" data-badge-caption="rents">
              400
            </span>
          </li>
          <li class="collection-item"><b>Alvin Eclair</b>
            <span class="new badge blue lighten-1" data-badge-caption="rents">
              400
            </span>
          </li>
          <li class="collection-item"><b>Alvin Eclair</b>
            <span class="new badge blue lighten-1" data-badge-caption="rents">
              400
            </span>
          </li>
          <li class="collection-item"><b>Alvin Eclair</b>
            <span class="new badge blue lighten-1" data-badge-caption="rents">
              400
            </span>
          </li>
          <li class="collection-item"><b>Alvin Eclair</b>
            <span class="new badge blue lighten-1" data-badge-caption="rents">
              400
            </span>
          </li>
          <li class="collection-item"><b>Alvin Eclair</b>
            <span class="new badge blue lighten-1" data-badge-caption="rents">
              400
            </span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="table-container dashboard-card-table">
  <h4 style="margin-left:10px;">Current rents</h4>
  <table class="bordered centered highlight">
    <thead>
      <tr>
        <th>Name</th>
        <th>Girlfriend</th>
        <th>Status</th>
        <th>Schedule</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>Alvin Eclair</td>
        <td>Girlfriend name</td>
        <td>example@email.com</td>
        <td>#00000000000</td>
      </tr>
      <tr>
        <td>Alvin</td>
        <td>Eclair</td>
        <td>example@email.com</td>
        <td>#00000000000</td>
      </tr>
      <tr>
        <td>Alvin</td>
        <td>Eclair</td>
        <td>example@email.com</td>
        <td>#00000000000</td>
      </tr>
      <tr>
        <td>Alvin</td>
        <td>Eclair</td>
        <td>example@email.com</td>
        <td>#00000000000</td>
      </tr>
      <tr>
        <td>Alvin</td>
        <td>Eclair</td>
        <td>example@email.com</td>
        <td>#00000000000</td>
      </tr>
    </tbody>
  </table>
  <div class="view-more-btn-container">
    <button class="btn btn-flat waves-effect waves-light blue lighten-1 white-text">View more</button>
  </div>
</div>
@endsection