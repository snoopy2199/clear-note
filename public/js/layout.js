$(document).ready(function(){
    // for feedback pop-over
    $(function () {
        $('[data-toggle="popover"]').popover({
            html: true,
            content: function() {
                return $('#popover_content').html();
            }
        })
    });

    // for register
    $("#regist_form").submit( function(event) {
        var email = $('#regist_inputEmail').val().trim();
        register(email);

        // don't do submit
        event.preventDefault();
    });
});

function register(email) {
    $.ajax({
        url: '/api/user/register',
        type: 'POST',
        data: {
            email: email
        },
        success: function(response) {
            alert('註冊成功，請至信箱認證');
        },
        error: function (response) {
            alert(response.responseJSON.msg);
        }
    });
}