tinymce.init({
  selector:'textarea',
  height:250,
  width:'100%',
  theme:'modern',
  resize:false,
  plugins: "link image code fullscreen paste",
});

const url = 'http://localhost:8000';

$(document).ready(function() {
	$('.chips').material_chip();
	let girlfriendTags = $('.chips').material_chip('data');
	$('#add-girlfriend-form').on('submit', function(e) {
		e.preventDefault();
		let gfData = new FormData(this);
		$.ajax({
			type: 'POST',
			url:`${url}/admin/girlfriend/create`,
			data: gfData,
			contentType:false,
			cache:false,
			processData:false
		}).done(res => {
			console.log(res);
			Materialize.toast("Girlfriend Added", 2000);
		}).fail(err => {
			console.log(err);
		})
	});
})