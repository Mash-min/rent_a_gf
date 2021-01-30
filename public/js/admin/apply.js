$('.chips').material_chip();
tinymce.init({
  selector:'textarea',
  height:250,
  width:'100%',
  theme:'modern',
  resize:false,
  plugins: "link image code fullscreen paste",
});

$(document).ready(function() {
	$('#apply-girlfriend-form').on('submit', function(e) {
		e.preventDefault()
		let girlfriendTags = $('.tag-chips').material_chip('data');
		let applicationData = new FormData(this)
		$.ajax({
			type: 'POST',
			url:`${url}/apply-as-girlfriend`,
			data: applicationData,
			contentType:false,
			processData:false,
			cache:false
		}).done(res => {
			console.log(res)
			/*============== post request for tags ===============*/
				for(var x in girlfriendTags) {
					$.ajax({
						type:'POST',
						url:`${url}/apply-as-girlfriend-tags`,
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
				swal("Please wait for a moment...",{
			    buttons:false,
			    closeOnClickOutside:false,
			    icon:"info"
			  });
				window.location.replace('/apply-as-girlfriend')
			/*============== post request for tags ===============*/
		}).fail(err => {
			Materialize.Toast.removeAll();
			for(var x in err.responseJSON.errors) {
				Materialize.toast(err.responseJSON.errors[x], 10000 ,'red')
			}
		})
	})
})