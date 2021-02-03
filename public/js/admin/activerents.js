let pageNumber = 1;

$(document).ready(function() {
	$.ajax({
		type:'GET',
		url:`${url}/admin/active-rents/json?page=${pageNumber}`
	}).done(res => {
		pageNumber = pageNumber + 1;
		console.log(res)
		for(var x in res.rents.data) {
			let rent1 = new Rent(
				res.rents.data[x].id,
				res.rents.data[x].user_id,
				res.rents.data[x].user.firstname,
				res.rents.data[x].user.lastname,
				res.rents.data[x].girlfriend.id,
				res.rents.data[x].girlfriend.username,
				res.rents.data[x].girlfriend.rate,
				res.rents.data[x].status
			);
			$('#active-rents-row').append(rent1.rentTableRow())
		}
	}).fail(err => {
		console.log(err)
	})
})