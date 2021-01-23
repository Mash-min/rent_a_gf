$(document).ready( function () {
		let girlfriendData = [
			{
				"firtname": "Firstname",
				"lastname": "Lastname",
				"email": "email@email.com",
				"contact": "00000000000",
				"username": "Username"
			},
			{
				"firtname": "Firstname",
				"lastname": "Lastname",
				"email": "email@email.com",
				"contact": "00000000000",
				"username": "Unique"
			}
		]
    $('#table_id').DataTable({
    	data: girlfriendData,
    	columns: [
	        { data: 'firtname' },
	        { data: 'lastname' },
	        { data: 'email' },
	        { data: 'contact' },
	        { data: 'username' }
	    ]
    });
} );