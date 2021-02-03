function rentGirlfriend(gid) {
	swal({
    title: "Rent selected Girlfriend?",
    icon: "info",
    buttons: true,
    dangerMode: true
  }).then((willRent) => {
    if (willRent) {
      $.ajax({
				type: 'POST',
				url:`${url}/rent/create`,
				data: {
					_token: $('input[name=_token]').val(),
					girlfriend_id:gid
				}
			}).done(res => {
				if (res.message) {
					Materialize.toast(res.message, 3000, 'red');
				}else {
					Materialize.toast("Rent request sent", 2000, 'blue');
					$('.change-profile-btn').remove();
					$('#rent-btn-container').append(`
						<button class="btn btn-flat red lighten-1 white-text change-profile-btn waves-effect waves-light" onclick="deleteRent('${res.id}')">
	            Cancel rent
	          </button>
					`);	
				}
				
				console.log(res)
			}).fail(err => {
				console.log(err)
			})
    }/* if user clicks ok */
  });
}

function deleteRent(id) {
	swal({
    title: "Cancel Rent?",
    icon: "info",
    buttons: true,
    dangerMode: true
  }).then((willRent) => {
    if (willRent) {
      $.ajax({
				type: 'DELETE',
				url:`${url}/rent/delete/${id}`,
				data: {
					_token: $('input[name=_token]').val()
				}
			}).done(res => {
				Materialize.toast("Rent Canceled", 2000, 'red');
				$('.change-profile-btn').remove();
				$('#rent-btn-container').append(`
					<button class="btn btn-flat green lighten-1 white-text change-profile-btn waves-effect waves-light modal-trigger" onclick="rentGirlfriend('${res.girlfriend_id}')">
            Rent girlfriend
          </button>
				`);
				console.log(res)
			}).fail(err => {
				console.log(err)
			})
    }/* if user clicks ok */
  });
}