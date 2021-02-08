$(document).ready(function() {
	const image = $('#image');
	$('#updateImageForm').on('submit', function(e) {
		e.preventDefault();
		let imageData = new FormData(this);
		imageData.append("image",e.target.files)
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
	})/* ======= IMAGE FORM SUBMIT ========= */

});

function resetPassword() {
	swal({
		content: {
			element:"input",
			attributes: {
				placeholder: "Enter your current password",
				type: "password"
			}
		}
	}).then((value) => {
			if(value) {
				$.ajax({
					type:'POST',
					url:`${url}/user/settings/check-password`,
					data: {
						_token:$('input[name=_token]').val(),
						password: value
					}
				}).done(res => {
						swal({
							content: {
								element:"input",
								attributes: {
									placeholder: "Enter your new password",
									type: "password"
								}
							}
						}).then((password) => {
							if(password) {
								$.ajax({
									type:'POST',
									url:`${url}/user/settings/reset-password`,
									data: {
										_token:$('input[name=_token]').val(),
										password: password
									}
								}).done(res => {
									Materialize.toast("Password successfully changed",3000,'blue white-text');
								}).fail(err => {
									// console.log(err);
								})/*===================== AJAX REQUEST RESETING PASSWORD ==================*/	
							}else {}
						})
				}).fail(err => {
					Materialize.toast(err.responseJSON.error,3000,'red white-text');
				});/*===================== AJAX REQUEST CHECKING IF PASSWORD IS MATCHED ==================*/	
			} else {

			}
	})/*================ SWEETALERT ASKING FOR CURRENT PASSWORD ====================*/
	
}

