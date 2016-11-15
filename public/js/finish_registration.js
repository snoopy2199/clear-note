$(document).ready(function(){
    $('#finish_regist_form').submit( function(event) {
        var password1 = $('#inputPassword').val();
        var password2 = $('#inputPasswordAgain').val();

        if (password1 != password2) {
            alert("兩次輸入密碼不同，請重新輸入");
            event.preventDefault();
        }
    });
});