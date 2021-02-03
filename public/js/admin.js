const url = location.protocol +'//'+location.host;
function logout() {
  swal({
    title: "Are you sure ?",
    icon: "warning",
    buttons: true,
    dangerMode: true
  }).then((willLogout) => {
    if (willLogout) {
      $('#logout-form').submit();
    }/* if user clicks delete */
  });
}