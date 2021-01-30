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
				Materialize.toast("Rent request sent", 30000, 'blue');
				console.log(res)
			}).fail(err => {
				console.log(err)
			})
    }/* if user clicks ok */
  });
}