class Notification {
  constructor(id, read_at, updated_at, message, status) {
    this.id = id;
    this.read_at = read_at;
    this.updated_at = updated_at;
    this.message = message;
    this.status = status
    this.read_at = read_at;
  }

  notificationItem() {
    if(this.read_at === null) {
      return `
        <li class="collection-item notification-item ${this.read_at}">
          <a><i class="fa fa-chevron-right black-text"></i> </a>
          <a class="black-text">${this.message}</a>
          <a href="javascript:void(0)" class="secondary-content" onclick="markAsRead('${this.id}')">
            <i class="fa fa-check green-text"></i>
          </a>
        </li>
      `;
    }else {
      return `
        <li class="collection-item notification-item ${this.read_at}">
          <a><i class="fa fa-chevron-right grey-text"></i> </a>
          <a class="grey-text">${this.message}</a>
          <a class="secondary-content">
            <i class="fa fa-circle grey-text"></i>
          </a>
        </li>
      `;
    }
  }/* =========== NOTIFICATION ITEM =============*/

}/* =========== NOTIFICATION CLASSS =============*/

let notificationUrl = `${url}/notifications/json`;
$(document).ready(() => {  getNotification() });

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
        res.notifications.data[x].data.message,
        res.notifications.data[x].data.status,
      );
      $('.notification-container').append(notification1.notificationItem());
    }
  }).fail((err) => {
    console.log(err);
  });
}/* =========== GET NOTIFICAION AJAX =============*/

function markAsRead(id) {
  $.ajax({
    type:'post',
    url:`${url}/notification/read/${id}`,
    data: {
      _token:$('input[name=_token]').val()
    }
  }).done((res) => {
    loader();
    $('.notification-item').remove();
    getNotification();
    console.log(res);
  }).fail((err) => {
    console.log(err);
  });
}/* =========== MARK AS READ NOTIFIACION =============*/