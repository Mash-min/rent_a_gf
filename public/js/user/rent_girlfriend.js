function checkGirlfriendRent(girlfriend_id) {
  loader();
  $.ajax({
	type:'get',
	url:`${url}/girlfriend/check_rent/json/${girlfriend_id}`
  }).done((res) => {
	swal.close();
	console.log(res);
	if(res.user_rent === null) {
	  let rent1 = new RentButton(
		null,
		girlfriend_id,
		null
	  );
	  $('#rent-btn-container').append(rent1.rentButton());
	}else {
	  let rent1 = new RentButton(
		res.user_rent.id,
		res.user_rent.girlfriend_id,
		res.user_rent.user_id
	  );
	  $('#rent-btn-container').append(rent1.cancelRentButton());
	}
  }).fail((err) => {
	console.log(err);
  })
}

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
				swal({
					title:"Ooofff...!",
					text:res.message
				});
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

