@extends('layouts.admin')

@section('content')

<div class="row dashboard-card-table">
  <div class="col s12 ">
    <ul class="tabs center">
      <li class="tab col s5 offset-s1"><a href="#table1"><i class="fa fa-list"></i> Account List</a></li>
      <li class="tab col s5"><a href="#table2"><i class="fa fa-search"></i> Search Account</a></li>
    </ul>
  </div>
  <div id="edit-account-modal" class="modal modal-fixed-footer">
    <form id="edit-account-form" autocomplete="off">
      <div class="modal-content">
        {{ @csrf_field() }}
        <h4 class="center">Edit Account</h4>
        <div class="row">
          <div class="input-field col l6 offset-l3 m8 offset-m2 s12">
            <input id="firstname" type="text" class="validate active" name="firstname" placeholder="Enter firstname">
            <label for="username"><i class="fa fa-pencil"></i> Firstname</label>
          </div>
          <div class="input-field col l6 offset-l3 m8 offset-m2 s12">
            <input id="lastname" type="text" class="validate active" name="lastname" placeholder="Enter lastname">
            <label for="lastname"><i class="fa fa-pencil"></i> Lastname</label>
          </div>
          <div class="input-field col l6 offset-l3 m8 offset-m2 s12">
            <input id="address" type="text" class="validate active" name="address" placeholder="Enter address">
            <label for="address"><i class="fa fa-pencil"></i> Address</label>
          </div>
          <div class="input-field col l6 offset-l3 m8 offset-m2 s12">
            <input id="email" type="email" class="validate active" name="email" placeholder="Enter email">
            <label for="email"><i class="fa fa-pencil"></i> Email</label>
          </div>
          <div class="input-field col l6 offset-l3 m8 offset-m2 s12">
            <input id="contact" type="text" class="validate active" name="contact" placeholder="Enter contact">
            <label for="contact"><i class="fa fa-pencil"></i> Contact</label>
          </div>
          <div class="input-fiel col l6 offset-l3 m8 offset-m2 s12">
            <label for="birthdate"><i class="fa fa-pencil"></i> Birthdate</label>
            <input type="text" class="datepicker" id="birthdate" name="birthdate" placeholder="Select your birthdate">
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
  <!-- ================= TABLE 1 =================== -->
  <div id="table1" class="col s12">
    <table class="bordered striped centered highlight responsive-table" id="account-list-table">
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
          <th>Contact</th>
          <th>Edit</th>
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
<script type="text/javascript" src="/js/admin/account.js"></script>
<script type="text/javascript" src="/js/admin/account_list.js"></script>
<script>
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 60, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    format: 'yyyy-mm-dd',
    clear: 'Clear',
    close: 'Ok',
  });
</script>
@endsection