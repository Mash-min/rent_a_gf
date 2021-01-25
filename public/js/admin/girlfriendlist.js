const url = location.protocol +'//'+location.host;
$('.modal').modal();

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
      console.log(res)
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

  $('#search-girlfriend-form').on('submit', function(e) {
    e.preventDefault();
    let searchData = $('#search-gf-input').val()
    swal("Searching...",{
      buttons:false,
      closeOnClickOutside:false,
      icon:"info"
    });
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
});