@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col l4 m4 s6">
    <div class="card dashboard-card">
      <div class="card-content row">
        <div class="col s6 user-count" id="user-count">
          <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue-only">
              <div class="circle-clipper left">
                <div class="circle"></div>
              </div><div class="gap-patch">
                <div class="circle"></div>
              </div><div class="circle-clipper right">
                <div class="circle"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col s6">
          <i class="fa fa-user fa-3x"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="col l4 m4 s6">
    <div class="card dashboard-card">
      <div class="card-content row">
        <div class="col s6 user-count" id="rents-count">
          <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue-only">
              <div class="circle-clipper left">
                <div class="circle"></div>
              </div><div class="gap-patch">
                <div class="circle"></div>
              </div><div class="circle-clipper right">
                <div class="circle"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col s6">
          <i class="fa fa-shopping-cart fa-3x"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="col l4 m4 s12">
    <div class="card dashboard-card">
      <div class="card-content row">
        <div class="col s6 user-count" id="girlfriends-count">
          <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue-only">
              <div class="circle-clipper left">
                <div class="circle"></div>
              </div><div class="gap-patch">
                <div class="circle"></div>
              </div><div class="circle-clipper right">
                <div class="circle"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col s6">
          <i class="fa fa-female fa-3x"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="col l12 s12">
    <div class="card top-girlfriend">
      <div class="card-content row" style="padding:5px">
        <ul class="collection with-header">
          <li class="collection-header"><h4>Top Girlfriends</h4></li>
          <div id="top-girlfriend-container">
            
          </div>
          <button class="btn btn-flat waves-light waves-effect blue lighten-1 white-text" style="width:100%" id="view-more-top-girlfriends-btn">
          <i class="fa fa-chevron-down"></i>
          </button>
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
    <button class="btn btn-flat waves-effect waves-light blue lighten-1 white-text">
      <i class="fa fa-chevron-down"></i>
    </button>
  </div>
</div>
@endsection

@section('scripts')
  <script src="/js/admin/dashboard.js"></script>
@endsection