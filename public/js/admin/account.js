class Account {
	constructor(id, firstname, lastname, birthdate ,contact,email ,image, bio, role, address) {
    this.id = id;
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
        <td class="td-${this.id}">${this.firstname}</td>
        <td class="td-${this.id}">${this.lastname}</td>
        <td class="td-${this.id}">${this.email}</td>
        <td class="td-${this.id}">${this.contact}</td>
        <td class="td-${this.id}">
          <a class="btn btn-flat waves-effect waves-light green lighten-1 white-text modal-trigger" href="#edit-account-modal" onclick="findAccount('${this.id}')">
            <i class="fa fa-pencil"></i>
          </a>
        </td>
      </tr>
    `
  }

    accountTableData() {
      return `
        <td class="td-${this.id}">${this.firstname}</td>
        <td class="td-${this.id}">${this.lastname}</td>
        <td class="td-${this.id}">${this.email}</td>
        <td class="td-${this.id}">${this.contact}</td>
        <td class="td-${this.id}">
          <a class="btn btn-flat waves-effect waves-light green lighten-1 white-text modal-trigger" href="#edit-account-modal" onclick="findAccount('${this.id}')">
            <i class="fa fa-pencil"></i>
          </a>
        </td>
      `
    }

  searchedAccountTableRow() {
    return `
      <tr class="searched-account-table-row" id="tr-${this.id}">
        <td class="td-${this.id}">${this.firstname}</td>
        <td class="td-${this.id}">${this.lastname}</td>
        <td class="td-${this.id}">${this.email}</td>
        <td class="td-${this.id}">${this.contact}</td>
        <td class="td-${this.id}">
          <a class="btn btn-flat waves-effect waves-light green lighten-1 white-text modal-trigger" href="#edit-account-modal" onclick="findAccount('${this.id}')">
            <i class="fa fa-pencil"></i>
          </a>
        </td>
      </tr>
    `
  }
}