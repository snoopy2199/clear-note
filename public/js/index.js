$(document).ready(function(){
    // for register
    $("#index_regist_form").submit( function(event) {
        var email = $('#index_regist_inputEmail').val().trim();
        // this function in layout.js
        register(email);

        // don't do submit
        event.preventDefault();
    });
});