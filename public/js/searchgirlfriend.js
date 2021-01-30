$('#search-girlfriend-form').on('submit', function(e) {
	e.preventDefault()
	let searchGirlfriend = $('#girlfriend').val()
	swal("Searching...",{
    buttons:false,
    closeOnClickOutside:false,
    icon:"info"
  });
	$.ajax({
		type:'GET',
		url:`${url}/girlfriend/json/${searchGirlfriend}`
	}).done(res => {
		swal.close()
		if (res.girlfriend.length == 0) {
			Materialize.toast("No results found");
		}
		$('.searched-card').remove();
		for(var x in res.girlfriend) {
			let girlfriend1 = new Girlfriend(
	      res.girlfriend[x].id,
	      res.girlfriend[x].user.firstname, 
	      res.girlfriend[x].user.lastname, 
	      res.girlfriend[x].username, 
	      res.girlfriend[x].rate, 
	      res.girlfriend[x].user.email, 
	      res.girlfriend[x].user.contact, 
	      res.girlfriend[x].user.image, 
	      res.girlfriend[x].status, 
	      res.girlfriend[x].availability
	    )
			$('#searched-girlfriend-container').append(girlfriend1.girlfriendCard());
		}
	}).fail(err => {
		console.log(err)
	})
})