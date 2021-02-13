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
				let rent1 = new RentButton(
                    res.id,
                    res.girlfriend_id,
                    res.user_id
                );
                $('#rent-btn-container').append(rent1.cancelRentButton());
			}
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
            let rent1 = new RentButton(
                res.id,
                res.girlfriend_id,
                res.user_id
            );
            $('#rent-btn-container').append(rent1.rentButton());
		}).fail(err => {
			console.log(err)
		})
    }/* if user clicks ok */
  });
}