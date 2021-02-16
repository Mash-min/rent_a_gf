class Notification {
  constructor(id, read_at, updated_at, message) {
    this.id = id;
    this.read_at = read_at;
    this.updated_at = updated_at;
    this.message = message;
  }

  notificationItem() {
    return `
      <li class="collection-item notification-item">
        <a href=""><i class="fa fa-circle blue-text"></i> </a>
        <a href="/my-rent">${this.message}</a>
      </li>
    `;
  }

}

$(document).ready(() => {
    getNotification();
})

let notificationUrl = `${url}/notifications/json`;
function getNotification() {
  loader();
  $.ajax({
    type:'GET',
    url:notificationUrl
  }).done((res) => {
    console.log(res);
    swal.close();
    for(var x in res.notifications.data) {
      let notification1 = new Notification(
        res.notifications.data[x].id,
        res.notifications.data[x].read_at,
        res.notifications.data[x].updated_at,
        res.notifications.data[x].data.message
      );
      $('.notification-container').append(notification1.notificationItem());
    }
  }).fail((err) => {
    console.log(err);
  });
}