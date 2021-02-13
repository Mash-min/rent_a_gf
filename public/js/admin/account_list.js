$(document).ready(function() {
  $('.modal').modal();
  // ===================== GET request for Account list ========================
	let pageNumber1 = 1;
	swal("Fetching data",{
		buttons:false,
		closeOnClickOutside:false,
		icon:"info"
	});
	$.ajax({
		type:'GET',
		url:`${url}/admin/accountlist/json?page=${pageNumber1}`
	}).done(res => {
		swal.close()
		pageNumber1 = pageNumber1 + 1;
		console.log(res)
		for(var x in res.users.data){
			let account1 = new Account(
				res.users.data[x].id,
				res.users.data[x].firstname,
				res.users.data[x].lastname,
				res.users.data[x].birthdate,
				res.users.data[x].contact,
				res.users.data[x].email,
				res.users.data[x].image,
				res.users.data[x].bio,
				res.users.data[x].role,
				res.users.data[x].address,
			)
			$('#account-tb').append(account1.accountTableRow())
		}
	}).fail(err => {
		console.log(err)
	})
  // ===================== GET request for Account list ========================

  // ===================== GET request for Viewmore Account list ===============
	$('#view-more-account-btn').on('click', function() {
		swal("Fetching data",{
			buttons:false,
			closeOnClickOutside:false,
			icon:"info"
		});
		$.ajax({
			type:'GET',
			url:`${url}/admin/accountlist/json?page=${pageNumber1}`
		}).done(res => {
			swal.close()
			pageNumber1 = pageNumber1 + 1;
			console.log(res)
			if (res.users.data.length == 0) {
				$('#view-more-account-btn').remove();
				Materialize.toast("All data are loaded", 3000);
			}
			for(var x in res.users.data){
				let account1 = new Account(
					res.users.data[x].id,
					res.users.data[x].firstname,
					res.users.data[x].lastname,
					res.users.data[x].birthdate,
					res.users.data[x].contact,
					res.users.data[x].email,
					res.users.data[x].image,
					res.users.data[x].bio,
					res.users.data[x].role,
					res.users.data[x].address,
				)
				$('#account-tb').append(account1.accountTableRow())
			}
		}).fail(err => {	
			console.log(err)
		})
	})
  // ===================== GET request for Viewmore Account list ===============

  // ===================== GET request for Search Account list =================
	$('#search-account-form').on('submit', function(e) {
		e.preventDefault();
		let accountData = $('#search-account-input').val()
		swal("Fetching data",{
			buttons:false,
			closeOnClickOutside:false,
			icon:"info"
		})
		$.ajax({
			type:'GET',
			url:`${url}/admin/accountlist/search/${accountData}`
		}).done(res => {
			$('.searched-account-table-row').remove()
			swal.close()
			console.log(res)
			for(var x in res.user.data) {
				let account2 = new Account(
					res.user.data[x].id,
					res.user.data[x].firstname,
					res.user.data[x].lastname,
					res.user.data[x].birthdate,
					res.user.data[x].contact,
					res.user.data[x].email,
					res.user.data[x].image,
					res.user.data[x].bio,
					res.user.data[x].role,
					res.user.data[x].address,
				)
				$('#searched-account-tb').append(account2.searchedAccountTableRow())
			}
		}).fail(err => {
			console.log(err)
		})
	});
 // ===================== GET request for Search Account list =================
  $('#edit-account-form').on('submit', function(e) {
	e.preventDefault();
	let accountData = new FormData(this);
	swal("Updating account...",{
	  buttons:false,
	  closeOnClickOutside:false,
	  icon:"info"
	});
	$.ajax({
	  type:'post',
	  url:`${url}/admin/accoutlist/update/${userId}`,
	  data: accountData,
	  processData:false,
	  cache:false,
	  contentType:false
	}).done(res => {
		swal.close();
		$(`.td-${res.user.id}`).remove();  
		let account1 = new Account(
		  res.user.id,
		  res.user.firstname,
		  res.user.lastname,
		  res.user.birthdate,
		  res.user.contact,
		  res.user.email,
		  res.user.image,
		  res.user.bio,
		  res.user.role,
		  res.user.address
		)
		$(`#tr-${res.user.id}`).append(account1.accountTableData());
		$('#edit-account-modal').modal('close');
		Materialize.toast("Account updated", 3000);
	}).fail(err => {
		console.log(err)
	});
  })
});

let userId = '';
function findAccount(id) {
  $.ajax({
	type:'get',
	url:`${url}/admin/accountlist/find/${id}`
  }).done(res => {
	  console.log(res)
	  userId = res.user.id;
	  $('#firstname').val(res.user.firstname)
	  $('#lastname').val(res.user.lastname)
	  $('#address').val(res.user.address)
	  $('#email').val(res.user.email)
	  $('#birthdate').val(res.user.birthdate)
	  $('#contact').val(res.user.contact)
  }).fail(err => {
	  console.log(err)
  });
}