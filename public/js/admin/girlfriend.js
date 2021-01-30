class Girlfriend {
  constructor(id, firstname, lastname, username, rate, email, contact, image, status, availability) {
    this.id = id;
    this.firstname = firstname;
    this.lastname = lastname;
    this.username = username;
    this.rate = rate;
    this.email = email;
    this.contact = contact;
    this.image = image;
    this.status = status;
    this.availability = availability;
  }

  girlfriendTableRow() {
    return `
      <tr class="girlfriend-table-row" id="tr-${this.id}">
        <td><i>${this.username}</i></td>
        <td>${this.firstname}</td>
        <td>${this.lastname}</td>
        <td>${this.email}</td>
        <td>${this.contact}</td>
        <td><b>$${this.rate}.00</b></td>
        <td>
          <button class="btn btn-flat waves-effect waves-light green lighten-1 white-text modal-trigger" href="#edit-gf-modal" onclick="findGirlfriendData(${this.id})">
            <i class="fa fa-pencil"></i>
          </button>
          <button class="btn btn-flat waves-effect waves-light red lighten-1 white-text">
            <i class="fa fa-trash"></i>
          </button>
        </td>
      </tr>
    `
  }

  searchedGirlfriendTableRow() {
    return `
      <tr class="searched-girlfriend-table-row" id="tr-${this.id}">
        <td><i>${this.username}</i></td>
        <td>${this.firstname}</td>
        <td>${this.lastname}</td>
        <td>${this.email}</td>
        <td>${this.contact}</td>
        <td><b>$${this.rate}.00</b></td>
        <td>
          <button class="btn btn-flat waves-effect waves-light green lighten-1 white-text modal-trigger" href="#edit-gf-modal" onclick="findGirlfriendData(${this.id})">
            <i class="fa fa-pencil"></i>
          </button>
          <button class="btn btn-flat waves-effect waves-light red lighten-1 white-text">
            <i class="fa fa-trash"></i>
          </button>
        </td>
      </tr>
    `
  }

  girlfriendRequestRow() {
    return `
      <tr class="girlfriend-request-table-row" id="tr-${this.id}">
        <td>
          <button class="btn btn-flat blue lighten-1 waves-light waves-effect white-text">
            <i class="fa fa-eye"></i>
          </button>
        </td>
        <td>${this.firstname}</td>
        <td>${this.lastname}</td>
        <td>${this.email}</td>
        <td>#${this.contact}</td>
        <td>${this.username}</td>
        <td>
          <button class="btn btn-flat green lighten-1 waves-light waves-effect white-text" onclick="acceptRequest('${this.id}')">
            <i class="fa fa-check"></i>
          </button>
          <button class="btn btn-flat red lighten-1 waves-light waves-effect white-text" onclick="declineRequest('${this.id}')">
            <i class="fa fa-times"></i>
          </button>
        </td>
      </tr>
    `
  }

  girlfriendCard() {
    return `
      <div class="col l3 s6 searched-card">
        <div class="card rent-card">
          <div class="card-content">
            <div class="rent-image">
              <img src="/storage/images/profiles/${this.image}">
            </div>
            <span class="card-title rent-card-title">
              ${this.username} <br>
              <b>$ ${this.rate}.00</b>
            </span>
          </div>
          <div class="card-action">
            <a href="rent/girlfriend/${this.username}" class="btn btn-flat blue lighten-1 waves-effect waves-light white-text view-rent-btn" target="_blank">
              view
            </a>
          </div>
        </div>
      </div> 
    `
  }

}

class Pagination {
  constructor(active, label, url) {
    this.active = (active == true) ? "disabled" : "active";
    this.label = label;
    this.url = url;
  }

  paginationLinks() {
    return `
      <li class="waves-effect ${this.active}"><a href="#!">${this.label}</a></li>
    `;
  }
}

function findGirlfriendData(id) {
  $.ajax({
    type:'GET',
    url:`${url}/admin/girlfriend/find/${id}`
  }).done(res => {
    console.log(res);
    $('#username').val(res.girlfriend.username);
    $('#rate').val(res.girlfriend.rate);
    $('#description').val(res.girlfriend.description);
    $('#username').val(res.girlfriend.username);
    $('#girlfriend').val(res.user.firstname + " "+ res.user.lastname);
    $('#user_id').val(res.user.id);
    var tagsArray = [];
    for(var x in res.tags) {
      tagsArray.push({
        tag:res.tags[x].tag
      });
    }
    $('.tag-chips').material_chip({
      data:tagsArray
    });
  }).fail(err => {  
    console.log(err)
  })
}