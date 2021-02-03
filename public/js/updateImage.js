$(document).ready(function() {
	$('#updateImageForm').on('submit', function(e) {
		e.preventDefault();
		let imageData = new FormData(this);
		swal("Updating profile...",{
	    buttons:false,
	    closeOnClickOutside:false,
	    icon:"info"
	  });
		$.ajax({
			type:'POST',
			url:`http://localhost:8000/user/update/image`,
			data: imageData,
			processData: false,
			cache:false,
			contentType:false
		}).done(res =>{
			swal.close();
			$('#edit-profile-image-modal').modal('close');
			Materialize.toast("Profile Image Updated", 2000);
			$('.profile-image').remove();
			$('.edit-image-container').append(`
				<img src="/storage/images/profiles/${res}" class="profile-image">
			`);
			$('.profile-image-container').prepend(`
				<img src="/storage/images/profiles/${res}" class="profile-image">
			`);
		}).fail(err => {
			console.log(err)
		})
	})

	$.ajax({
		type:'GET',
		url:'https://api.imgur.com/3/account/Mashiyyat',
		header: {
			Authorization: 'Client-ID 35a8af79d41733b'
		}
	}).done(res => {
		console.log(res)
	}).fail(err => {
		console.log(err)
	})

});

