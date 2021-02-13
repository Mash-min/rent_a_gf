$(document).ready(() => { getGirlfriendCards() });

$('#view-more-rent-girlfriend-btn').click(() => { getGirlfriendCards() });
let girlfriendCardUrl = `${url}/rent/girlfriend/JSON?page=1`;
function getGirlfriendCards() {	
	loader();
	$.ajax({
		type:'GET',
		url:girlfriendCardUrl
	}).done(res => {
		swal.close()
		girlfriendCardUrl = res.girlfriends.next_page_url;
		if(res.girlfriends.next_page_url == null) {
			$('#view-more-rent-girlfriend-btn').remove();
		}
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
		swal.close()
		Materialize.toast("Something is wrong",3000,'red lighten-1');
		console.log(err)
	});
}