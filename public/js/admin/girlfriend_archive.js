$(document).ready(() => {
    getArchived();
})

function removeArchive(id) {
  swal({
    text: "Remove selected Girlfriend from archive?",
    icon: "warning",
    buttons: true,
    dangerMode: true
  }).then((willRemove) => {
    if(willRemove) {
      loader();
      $.ajax({
        type:'post',
        url:`${url}/admin/girlfriend/remove_archive/${id}`,
        data: {
          _token:$('input[name=_token]').val()
        }
      }).done(() => {
        $(`.tr-${id}`).remove();
        swal({
          icon: 'success',
          text:"Girlfriend removed from archive"
        });
      }).fail((err) => {
        console.log(err);
      });
    }
  });
}

let archiveURL = `${url}/admin/archive/json`;
function getArchived() {
  loader();
  $.ajax({
    type:'get',
    url:archiveURL
  }).done((res) => {
    swal.close();
    archiveURL = res.girlfriends.next_page_url;
    if(res.girlfriends.next_page_url == null) { $('#view-more-archive-btn').remove() }
    console.log(res);
    for(var x in res.girlfriends.data) {
      let archive1 = new Girlfriend(
        res.girlfriends.data[x].id, 
        res.girlfriends.data[x].user.firstname, 
        res.girlfriends.data[x].user.lastname, 
        res.girlfriends.data[x].username, 
        res.girlfriends.data[x].rate, 
        res.girlfriends.data[x].user.email, 
        res.girlfriends.data[x].user.contact, 
        res.girlfriends.data[x].user.image, 
        res.girlfriends.data[x].status, 
        res.girlfriends.data[x].availability
      );
      $('#girlfriend-archive-tb').append(archive1.girlfriendArchiveRow());
    }
  }).fail((err) => {
    console.log(err);
  });
}

$('#view-more-archive-btn').click(() => { getArchived() });

