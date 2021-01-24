$(document).ready( function () {
  $('#table_id').DataTable({
  	ajax: {
  		url: 'http://localhost:8000/admin/girlfriendlist/json',
  		dataSrc: 'girlfriends'
  	},
  	columns: [
        { data: 'user.firstname' },
        { data: 'user.lastname' },
        { data: 'user.email' },
        { data: 'user.contact' },
        { data: 'username' },
        { data: 'status' }
    ]
  });
} );