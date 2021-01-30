class Account {
	constructor(firstname, lastname, birthdate ,contact,email ,image, bio, role, address) {
		this.firstname = firstname;
		this.lastname = lastname;
		this.birthdate = birthdate;
		this.contact = contact;
		this.email = email;
		this.image = image;
		this.bio = bio;
		this.role = role;
		this.address = address;
	}

	accountTableRow() {
    return `
      <tr class="account-table-row" id="tr-${this.id}">
        <td>${this.firstname}</td>
        <td>${this.lastname}</td>
        <td>${this.email}</td>
        <td>${this.contact}</td>
        <td>
          <button class="btn btn-flat waves-effect waves-light green lighten-1 white-text modal-trigger" href="#edit-gf-modal" onclick="">
            <i class="fa fa-pencil"></i>
          </button>
          <button class="btn btn-flat waves-effect waves-light red lighten-1 white-text">
            <i class="fa fa-trash"></i>
          </button>
        </td>
      </tr>
    `
  }

  searchedAccountTableRow() {
    return `
      <tr class="searched-account-table-row" id="tr-${this.id}">
        <td>${this.firstname}</td>
        <td>${this.lastname}</td>
        <td>${this.email}</td>
        <td>${this.contact}</td>
        <td>
          <button class="btn btn-flat waves-effect waves-light green lighten-1 white-text modal-trigger" href="#edit-gf-modal" onclick="">
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