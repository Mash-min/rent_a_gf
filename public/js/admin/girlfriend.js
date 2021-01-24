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
        <td>$${this.rate}.00</td>
        <td>
          <button class="btn btn-flat waves-effect waves-light green lighten-1 white-text">
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
        <td>$${this.rate}.00</td>
        <td>
          <button class="btn btn-flat waves-effect waves-light green lighten-1 white-text">
            <i class="fa fa-pencil"></i>
          </button>
          <button class="btn btn-flat waves-effect waves-light red lighten-1 white-text">
            <i class="fa fa-trash"></i>
          </button>
        </td>
      </tr>
    `
  }

}