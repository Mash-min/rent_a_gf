$(document).ready(() => { getRentRequests() });

let rentRequestsUrl = `${url}/rent/requests`;
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

function acceptRequest(id) {
    swal({
        title: "Accept request?", 
        text: 'Accepting the selected request will ignore the ones!',
        dangerMode: true,
        buttons: true,
    }).then((willAccept) => {
        if(willAccept) {
            $.ajax({
                type:'post',
                url:`${url}/rent/accept/${id}`,
                data: {
                    _token:$('input[name=_token]').val()
                }
            }).done((res) => {
                console.log(res);
                $('.rent-collection').remove()
                Materialize.toast("Request Accepted",3000,'blue lighten-1');
            }).fail((err) => {
                console.log(err);
            })
        } //============== IF USER ACCEPT ============
    });
    
}