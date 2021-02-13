const url = location.protocol +'//'+location.host;

$(document).ready(function() {
  $(".button-collapse").sideNav();
  $('.modal').modal();
  $('.collapsible').collapsible();
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 60, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    format: 'yyyy-mm-dd',
    clear: 'Clear',
    close: 'Ok',
  });
});

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

function loader() {
  swal({
		text: "Loading....",
		button:false,
		closeOnEsc: false,
		closeOnClickOutside: false
	});
}