function register() {
    var email = $('#user_email').val().trim();

    if (!email) {
        alert('不可為空');
        return;
    }

    $.ajax({
        url: '/register',
        type: 'POST',
        data: {
            email: email
        },
        success: function(response) {
            alert('註冊成功，請至信箱認證');
        }
    });
}