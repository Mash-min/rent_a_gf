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
$('.chips').material_chip();
$('input.autocomplete').autocomplete({
  data: {
    
  },
  limit: 20,
  onAutocomplete: function(val) {
  },
  minLength: 1,
});