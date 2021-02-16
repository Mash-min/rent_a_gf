$('#message-form').submit((e) => {
    e.preventDefault();
    let message = $('#message-input').val();
    let time = new Date();
    $('#message-container').append(`
        <!-- =================== Message ============= -->
            <div class="sender message-container s12">
                <div class="message blue lighten-1 white-text waves-effect waves-light">
                    ${message}
                </div>
            </div> 
        <!-- =================== Message ============= -->
    `);
    $('#message-input').val("");
    window.scrollTo(0, document.body.scrollHeight);
});