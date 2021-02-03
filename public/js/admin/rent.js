class Rent {
	constructor(id, user_id,firstname,lastname, girlfriend_id,username,rate,status,created_at) {
		this.id = id;
		this.user_id = user_id;
		this.firstname = firstname;
		this.lastname = lastname;
		this.girlfriend_id = girlfriend_id;
		this.username = username;
		this.rate = rate;
		this.status = status;
	}

	rentTableRow() {
	  return `
	  	<tr id="tr-${this.id}">
      	<td>
      		<button class="btn btn-flat waves-effect waves-light blue lighten-1">
      			<i class="fa fa-eye white-text"></i>
      		</button>
      	</td>
      	<td>${this.firstname} ${this.lastname}</td>
      	<td>${this.username}</td>
      	<td>$ ${this.rate}.00</td>
      	<td><i class="fa fa-circle green-text"></i> ${this.status}</td>
      	<td>
      		<button class="btn btn-flat waves-effect waves-light green lighten-1 white-text">
      			<i class="fa fa-check"></i> Finish
      		</button>
      		<button class="btn btn-flat waves-effect waves-light red lighten-1 white-text">
      			<i class="fa fa-times"></i> Cancel
      		</button>
      	</td>
      </tr>
	  `;
	}

}