$(document).ready(() => { getRentRequests() });

let rentRequestsUrl = `${url}/girlfriend/rent/requests`;
function getRentRequests() {
    loader();
    $.ajax({
        type:'get',
        url:rentRequestsUrl
    }).done((res) => {
        swal.close();
        console.log(res);
        rentRequestsUrl = res.requests.next_page_url;
        if(res.requests.next_page_url == null) { $('#view-more-request-btn').remove() }
        for(var x in res.requests.data) {
            let request1 = new Rent(
                res.requests.data[x].id, 
                res.requests.data[x].girlfriend_id, 
                res.requests.data[x].girlfriend.username, 
                res.requests.data[x].price, 
                res.requests.data[x].status, 
                res.requests.data[x].user.email, 
                res.requests.data[x].user.firstname, 
                res.requests.data[x].user.lastname
            );
            $('#rent-request-container').append(request1.rentRequest());
        }
    }).fail((err) => {
        console.log(err);
    });
}

$('#view-more-request-btn').click(() => { getRentRequests() });