class Rent {
    constructor(id, girlfriend_id, username, price, status, user_email, user_fname, user_lname) {
        this.id = id;
        this.girlfriend_id;
        this.username = username;
        this.price = price;
        this.status = status;
        this.user_email = user_email;
        this.user_fname = user_fname;
        this.user_lname = user_lname; 
    }

    rentRequest() {
        return `
            <li class="collection-item avatar rent-collection" id="request-${this.id}">
                <img src="images/avatar.png" alt="" class="circle">
                <span class="title"><b>${this.user_fname} ${this.user_lname}</b></span>
                <p>${this.user_email}<br>
                </p>
                <div class="secondary-content">
                <button class="btn btn-flat green lighten-1 waves-effect waves-light white-text" onclick="acceptRequest('${this.id}')">
                    <i class="fa fa-check"></i>
                </button>
                <button class="btn btn-flat red lighten-1 waves-effect waves-light white-text">
                    <i class="fa fa-times"></i>
                </button>
                </div>
            </li>
        `;
    }
}

class RentButton {
    constructor(id, girlfriend_id, user_id) {
        this.id = id;
        this.girlfriend_id = girlfriend_id;
        this.user_id = user_id;
    }

    cancelRentButton() {
        $('.change-profile-btn').remove();
        return `
        <button class="btn btn-flat red lighten-1 white-text change-profile-btn waves-effect waves-light" onclick="deleteRent('${this.id}')">
            Cancel rent
        </button>
        `;
    }

    rentButton() {
        $('.change-profile-btn').remove();
        return `
        <button class="btn btn-flat blue lighten-1 white-text change-profile-btn waves-effect waves-light" onclick="rentGirlfriend('${this.girlfriend_id}')">
            Rent Girlfriend
        </button>
        `;
    }
}