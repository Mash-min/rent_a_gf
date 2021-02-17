class Feedback {
  constructor(id, feedback, firstname, lastname, userimage) {
    this.id = id;
    this.feedback = feedback;
    this.fullname = firstname + " " + lastname;
    this.userimage = userimage;
  }

  feedbackItem() {
    return `
      <li class="collection-item avatar" id="feedback-${this.id}">
        <img src="/images/avatar.png" alt="" class="circle">
        <span class="title">${this.fullname}</span>
          <p>  
           ${this.feedback}
          </p>
      </li>
    `;
  }

}

$('#feedback-form').on('submit', function(e) {
  e.preventDefault();
  let feedbackData = new FormData(this);
  loader();
  $.ajax({
    type:'post',
    url:`${url}/feedback/create`,
    cache:false,
    processData:false,
    contentType:false,
    data: feedbackData
  }).done((res) => {
    swal.close();
    $('#feedback-input').val("");
    let feedback1 = new Feedback(
      res.feedback.id, 
      res.feedback.feedback, 
      res.feedback.user.firstname, 
      res.feedback.user.lastname, 
      res.feedback.user.image
    );
    $('#feedbacks-container').prepend(feedback1.feedbackItem());
  }).fail((err) => {
    console.log(err);
  })
});

let feedBacksURL = `${url}/feedback/json/${girlfriend_id}`;
function getGirlfriendFeedbacks() {
  loader();
  $.ajax({
    type:'get',
    url:feedBacksURL
  }).done((res) => {
    swal.close();
    console.log(res);
    feedBacksURL = res.feedbacks.next_page_url;
    if(res.feedbacks.next_page_url === null) { $('#view-more-feedback-btn').remove() }
    for(var x in res.feedbacks.data) {
      let feedback1 = new Feedback(
        res.feedbacks.data[x].id, 
        res.feedbacks.data[x].feedback, 
        res.feedbacks.data[x].user.firstname, 
        res.feedbacks.data[x].user.lastname, 
        res.feedbacks.data[x].user.image
      );
      $('#feedbacks-container').append(feedback1.feedbackItem());
    }
  }).fail((err) => {
    console.log(err);
  })
}

$('#view-more-feedback-btn').click(() => { getGirlfriendFeedbacks() });