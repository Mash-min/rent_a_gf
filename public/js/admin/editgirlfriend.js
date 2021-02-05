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