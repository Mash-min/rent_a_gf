$(document).ready(function() {
	$('#updateImageForm').on('submit', function(e) {
		e.preventDefault();
		let imageData = new FormData(this);
		$.ajax({
			type:'POST',
			url:`http://localhost:8000/user/update/image`,
			data: imageData,
			processData: false,
			cache:false,
			contentType:false
		}).done(res =>{
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
});