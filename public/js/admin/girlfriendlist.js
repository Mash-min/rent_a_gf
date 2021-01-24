const url = location.protocol +'//'+location.host;

$(document).ready(function() {
  let pageNumber = 1;
  // ===================== GET request for GF list ========================
    swal("Fetching data",{
      buttons:false,
      closeOnClickOutside:false,
      icon:"info"
    });
    $.ajax({
      type:'GET',
      url:`${url}/admin/girlfriendlist/json?page=${pageNumber}`
    }).done(res => {
      swal.close();
      pageNumber = pageNumber + 1;
      // console.log(res)
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
  // ===================== GET request for GF list ========================

  // ===================== GET request for VIEW MORE ======================
  $('#view-more-gf-btn').on('click', function() {
    swal("Fetching data",{
      buttons:false,
      closeOnClickOutside:false,
      icon:"info"
    });
    $.ajax({
      type:'GET',
      url:`${url}/admin/girlfriendlist/json?page=${pageNumber}`
    }).done(res => {
      swal.close()
      if (res.girlfriends.data.length == 0) {
        $('.view-more-btn-container').remove();
        Materialize.toast("All data are loaded", 3000);
      }
      pageNumber = pageNumber + 1;
      for(var x in res.girlfriends.data) {
        let girlfriend2 = new Girlfriend(
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
        $('#girlfriend-tb').append(girlfriend2.girlfriendTableRow())
      }
    }).fail(err => {
      console.log(err)
    })
  })
  // ===================== GET request for VIEW MORE ======================

  // $('#search-gf-input').on('input', function() {
  //   let searchedGirlfriend = $('#search-gf-input').val();
  //   $.ajax({
  //     type:'GET',
  //     url:`${url}/admin/search/${searchedGirlfriend}`
  //   }).done(res => {
  //     $('#girlfriend-list-table').hide()
  //     if (res.girlfriends.data.length == 0) {
  //       Materialize.toast("Username not found",2000);
  //       $('#searched-table').hide()
  //       $('#girlfriend-list-table').show()
  //     }
  //     $('#searched-table').removeClass('hidden');
  //     $('.searched-girlfriend-table-row').remove()
  //     // console.log(res.girlfriends.data)
  //     for(var x in res.girlfriends.data) {
  //       let girlfriend3 = new Girlfriend(
  //         res.girlfriends.data[x].id,
  //         res.girlfriends.data[x].user.firstname, 
  //         res.girlfriends.data[x].user.lastname, 
  //         res.girlfriends.data[x].username, 
  //         res.girlfriends.data[x].rate, 
  //         res.girlfriends.data[x].user.email, 
  //         res.girlfriends.data[x].user.contact, 
  //         res.girlfriends.data[x].image, 
  //         res.girlfriends.data[x].status, 
  //         res.girlfriends.data[x].availability
  //       )
  //       $('#searched-girlfriend-tb').append(girlfriend3.searchedGirlfriendTableRow())
  //     }
  //   }).fail(err => {
  //     console.log(err)
  //   })
  // });
});