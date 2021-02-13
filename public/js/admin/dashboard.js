class TopGirlfriend {
	constructor(id, username, firstname, lastname, rents) {
		this.id = id;
		this.username = username;
		this.fullname = firstname + " " + lastname;
		this.rents = rents;
	}

	girlfriendCollection() {
		return `
			<li class="collection-item" id="li-${this.id}">
				<b>${this.username}</b> - (${this.fullname})
				<span class="new badge blue lighten-1" data-badge-caption="rents">
				${this.rents}
				</span>
			</li>
		`;
	}
}

$(document).ready(function() {
	getTopGirlfriends();
	$.ajax({
		type:'GET',
		url:`${url}/admin/dashboard/json/users`
	}).done(res => {
		$('.preloader-wrapper').remove()
		$('#user-count').append(`<span>${res.count}</span><br>Users`)
		$('#rents-count').append(`<span>${res.rent_count}</span><br>Rents`)
		$('#girlfriends-count').append(`<span>${res.girlfriends_count}</span><br>Girlfriends`)
	}).fail(err => {
		console.log(err)
	})
});
$('#view-more-top-girlfriends-btn').on('click', function() {
  getTopGirlfriends();
})

let topGirlfriendUrl = `${url}/admin/dashboard/json/top-girlfriends?page=1`;
function getTopGirlfriends() {
  loader();
  $.ajax({
	type:'GET',
	url:topGirlfriendUrl
  }).done(res => {
	swal.close()
	topGirlfriendUrl = res.girlfriends.next_page_url
	if(res.girlfriends.next_page_url == null) {
		$('#view-more-top-girlfriends-btn').remove()
	}
	console.log(res);
	for(var x in res.girlfriends.data) {
		let girlfriend1 = new TopGirlfriend(
			res.girlfriends.data[x].id,
			res.girlfriends.data[x].username,
			res.girlfriends.data[x].user.firstname,
			res.girlfriends.data[x].user.lastname,
			res.girlfriends.data[x].rents.length,
		);
		$('#top-girlfriend-container').append(girlfriend1.girlfriendCollection());
	}
  }).fail(err => {
	console.log(err);
  });
}