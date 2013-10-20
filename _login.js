$(function() {
    $( "#form_login" ).validate({
        rules: {
            login_username: {
                required: true
            },
            login_password: {
                required: true
            }
        },
        messages: {
            login_username: {
                required: "Login: Username is required."
            },
            login_password: {
                required: "Login: Password is required."
            }
        }
    });
});