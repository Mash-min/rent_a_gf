$(document).ready(function() {
  getGirlfriendList();
});

let girlfriendListUrl = `${url}/admin/girlfriendlist/json?page=1`;
function getGirlfriendList() {
	loader();
    $.ajax({
      type:'GET',
      url:girlfriendListUrl
    }).done(res => {
	  console.log(res)
	  swal.close();
	  girlfriendListUrl = res.girlfriends.next_page_url;
	  if(res.girlfriends.next_page_url == null) {
		  $('#view-more-gf-btn').remove();
	  }
      for(var x in res.girlfriends.data) {
        let girlfriend1 = new Girlfriend(
          res.girlfriends.data[x].id,
          res.girlfriends.data[x].user.firstname, 
          res.girlfriends.data[x].user.lastname, 
          res.girlfriends.data[x].username, 
          res.girlfriends.data[x].rate, 
          res.girlfriends.data[x].user.email, 
          res.girlfriends.data[x].user.contact, 
          res.girlfriends.data[x].image, 
          res.girlfriends.data[x].status, 
          res.girlfriends.data[x].availability
        )
        $('#girlfriend-tb').append(girlfriend1.girlfriendTableRow())
      }
    }).fail(err => {
      console.log(err)
    });
}

$('#view-more-gf-btn').on('click', function() {
	getGirlfriendList();
})
$('#search-girlfriend-form').on('submit', function(e) {
  e.preventDefault();
  loader()
  let searchData = $('#search-gf-input').val()
  $.ajax({
	type:'GET',
	url:`${url}/admin/search/${searchData}`
  }).done(res => {
    swal.close();
    let girlfriendData = res.girlfriends.data
    if(girlfriendData.length == 0) { Materialize.toast("No results found..", 2000) }
    $('.searched-girlfriend-table-row').remove()
	for(var x in girlfriendData) {
	  let girlfriend2 = new Girlfriend(
		girlfriendData[x].id,
		girlfriendData[x].user.firstname, 
		girlfriendData[x].user.lastname, 
		girlfriendData[x].username, 
		girlfriendData[x].rate, 
		girlfriendData[x].user.email, 
		girlfriendData[x].user.contact, 
		girlfriendData[x].image, 
		girlfriendData[x].status, 
		girlfriendData[x].availability
	  )
	  $('#searched-girlfriend-list-table').prepend(girlfriend2.searchedGirlfriendTableRow())
	}
  }).fail(err => {
	console.log(err)
  })
})

$('.tag-chips').material_chip();
$('#add-girlfriend-form').on('submit', function(e) {
	let girlfriendTags = $('.tag-chips').material_chip('data');
	e.preventDefault();
	let gfData = new FormData(this);
	/*============== post request for girlfriend ===============*/
	$.ajax({
		type: 'POST',
		url:`${url}/admin/girlfriend/create`,
		data: gfData,
		contentType:false,
		cache:false,
		processData:false
	}).done(res => {
		console.log(res);
		/*============== post request for tags ===============*/
			for(var x in girlfriendTags) {
				$.ajax({
					type:'POST',
					url:`${url}/admin/girlfriend/create/tag`,
					data: {
						_token: $('input[name=_token]').val(),
						tag: girlfriendTags[x].tag,
						girlfriend_id: res.girlfriend.id
					}
				}).done(res => {
					// console.log(res)
				}).fail(err => {
					console.log(err);
				})
			}
		/*============== post request for tags ===============*/
		Materialize.toast("Girlfriend Added", 2000);
		$('#username').val("");
		$('#rate').val("");
		$("#girlfriend").val("");
		$("#user_id").val("");
		$('.chip').remove();
		$('.tag-chips').material_chip({ data:[] });
		tinymce.activeEditor.setContent('');
	}).fail(err => {
		Materialize.Toast.removeAll();
		for(var x in err.responseJSON.errors) {
			Materialize.toast(err.responseJSON.errors[x], 10000 ,'red')
		}
	})
	/*============== post request for girlfriend ===============*/
});

$(document).ready(function(){
	/*============== GET request for USER LIST ===============*/
	$('#girlfriend').on('keyup', function() {
		let searchUser = $(this).val();
		$.ajax({
			type:'GET',
			url:`${url}/admin/chooseuser/${searchUser}`
		}).done(res => {
			$('.collection-item').remove();
			let userData = res.user.data.map(user => {
				return {
					fullname: user.firstname + " " + user.lastname,
					user_id: user.id
				}
			})
			for(var x in userData) {
				$('#user-results').append(`
					<a href="#!" class="collection-item" onclick="setUserId(${userData[x].user_id}, '${userData[x].fullname}')">${userData[x].fullname}</a>
				`);	
			}
			// console.log(userData);
		}).fail(err => {
			console.log(err)
		})
	});
	/*============== GET request for USER LIST ===============*/
});

function setUserId(id, fullname) {
	$('#user_id').val(id);
	$('#girlfriend').val(fullname);
	$('.collection-item').remove();
}

$(document).ready(function() {
	$('#edit-gf-form').on('submit', function(e) {
		e.preventDefault();
		let editGirlfriendData = new FormData(this);
		let editGirlfriendTags = $('.tag-chips').material_chip('data');
		$.ajax({
			type:'post',
			url:`${url}/admin/girlfriend/update/id=${girlfriendId}`,
			cache:false,
			contentType:false,
			processData:false,
			data: editGirlfriendData
		}).done(res => {
			console.log(res);
			tagArray = editGirlfriendTags.map(function(tag) {
			return tag.tag;
			})
			/*=============== UPDATE TAGS REQUEST ================*/
			$.ajax({
				type:'post',
				url:`${url}/admin/girlfriend/update/tag/id=${res.girlfriend.id}`,
				data: {
					_token:$('input[name=_token]').val(),
					tags: tagArray,
					girlfriend_id:res.girlfriend.id
				}
			}).done(res => {
				// console.log(res)
			}).fail(err => {
				console.log(err)
			})
			/*=============== UPDATE TAGS REQUEST ================*/
			$('#edit-gf-modal').modal('close');
			$('.tag-chips').material_chip({ data:[] });
			Materialize.toast("Data Updated", 3000);
			$(`.td-${girlfriendId}`).remove();
			let girlfriendData = new Girlfriend(
				res.girlfriend.id,
				res.user.firstname, 
				res.user.lastname, 
				res.girlfriend.username, 
				res.girlfriend.rate, 
				res.user.email, 
				res.user.contact, 
				res.user.image, 
				res.girlfriend.status, 
				res.girlfriend.availability
			);
      	$(`.tr-${girlfriendId}`).append(girlfriendData.girlfriendTableData())
		}).fail(err => {
			console.log(err)
		})
	})
})