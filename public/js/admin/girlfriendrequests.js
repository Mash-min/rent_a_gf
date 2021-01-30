$(document).ready(function() {
  swal("Fetching data",{
    buttons:false,
    closeOnClickOutside:false,
    icon:"info"
  });
	$.ajax({
		type:'GET',
		url:`${url}/admin/girlfriend/requests/json`
	}).done(res => {
		console.log(res)
    swal.close()
		for(var x in res.girlfriends.data) {
			let girlfriendRequest1 = new Girlfriend(
				res.girlfriends.data[x].id,
        res.girlfriends.data[x].user.firstname, 
        res.girlfriends.data[x].user.lastname, 
        res.girlfriends.data[x].username, 
        res.girlfriends.data[x].rate, 
        res.girlfriends.data[x].user.email, 
        res.girlfriends.data[x].user.contact, 
        res.girlfriends.data[x].image, 
        res.girlfriends.data[x].status, 
        res.girlfriends.data[x].availability
			)
		$('#girlfriend-requests-row').append(girlfriendRequest1.girlfriendRequestRow())
		}
	}).fail(err => {
		console.log(err)
	})
})

function acceptRequest(id) {
	swal({
    title: "Accept Request?",
    icon: "warning",
    buttons: true,
    dangerMode: true
  }).then((willLogout) => {
    if (willLogout) {
      $.ajax({
      	type:'POST',
        url:`${url}/admin/girlfriend/accept/id=${id}`,
        data: {
          _token: $('input[name=_token]').val()
        }
      }).done(res => {
        Materialize.toast("Girlfriend Accepted", 2000);
        $(`#tr-${id}`).remove()
      }).fail(err => {
        console.log(err)
      })
    }/* if user clicks delete */
  });
}

function declineRequest(id) {
  swal({
    title: "Decline Request?",
    icon: "warning",
    buttons: true,
    dangerMode: true
  }).then((willDecline) => {
    if (willDecline) {
      $.ajax({
        type:'POST',
        url:`${url}/admin/girlfriend/decline/id=${id}`,
        data: {
          _token: $('input[name=_token]').val()
        }
      }).done(res => {
        Materialize.toast("Girlfriend Declined", 2000);
        $(`#tr-${id}`).remove()
      }).fail(err => {
        console.log(err)
      })
    }/* if user clicks delete */
  });
}