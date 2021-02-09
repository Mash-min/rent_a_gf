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
// ===================== CLASS TOP-GIRLFRIEND ========================

$(document).ready(function() {

	swal("Fetching data...",{
		buttons:false,
		closeOnClickOutside:false,
		icon:"info"
	});

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
	// ===================== GET request for TOP GIRLFRIEND LIST ========================
	let pageNumber = 1;
	$.ajax({
		type:'GET',
		url:`${url}/admin/dashboard/json/top-girlfriends?page=${pageNumber}`
	}).done(res => {
		swal.close()
		pageNumber = pageNumber + 1;
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
	})
	// ===================== GET request for TOP GIRLFRIEND LIST ========================

	// ===================== GET request for VIEW MORE TOP GIRLFRIEND LIST ========================
	$('#view-more-top-girlfriends-btn').on('click', function() {
		swal("Fetching data",{
		buttons:false,
		closeOnClickOutside:false,
		icon:"info"
		});
		$.ajax({
			type:'GET',
			url:`${url}/admin/dashboard/json/top-girlfriends?page=${pageNumber}`
		}).done(res => {
			swal.close()
			if (res.girlfriends.data.length == 0) {
			$('#view-more-top-girlfriends-btn').remove();
			Materialize.toast("All data are loaded", 3000);
		}
		pageNumber = pageNumber + 1;
		console.log(res);
		for(var x in res.girlfriends.data) {
			let girlfriend2 = new TopGirlfriend(
				res.girlfriends.data[x].id,
				res.girlfriends.data[x].username,
				res.girlfriends.data[x].user.firstname,
				res.girlfriends.data[x].user.lastname,
				res.girlfriends.data[x].rents.length,
			);
			$('#top-girlfriend-container').append(girlfriend2.girlfriendCollection());
		}
		}).fail(err => {
			console.log(err);
		})
	})
	// ===================== GET request for VIEW MORE TOP GIRLFRIEND LIST ========================
});