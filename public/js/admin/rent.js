$(document).ready(function() {

	swal("Fetching data...",{
    buttons:false,
    closeOnClickOutside:false,
    icon:"info"
  });
	$.ajax({
		type:'GET',
		url:`${url}/rent/girlfriend/JSON`
	}).done(res => {
		swal.close()
		console.log(res)
		for(var x in res.girlfriends.data){
			let rentGirlfriend = new Girlfriend(
	      res.girlfriends.data[x].id,
	      res.girlfriends.data[x].user.firstname, 
	      res.girlfriends.data[x].user.lastname, 
	      res.girlfriends.data[x].username, 
	      res.girlfriends.data[x].rate, 
	      res.girlfriends.data[x].user.email, 
	      res.girlfriends.data[x].user.contact, 
	      res.girlfriends.data[x].user.image, 
	      res.girlfriends.data[x].status, 
	      res.girlfriends.data[x].availability
	    )
			$('#rent-girlfriend-container').append(rentGirlfriend.girlfriendCard());
		}
	}).fail(err => {
		console.log(err)
	})

});