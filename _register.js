$(function() {
    $( "#form_register" ).validate({
        rules: {
            user_username: {
                required: true
            },
            user_email: {
                required: true
            },
            user_password: {
                required: true
            }
        },
        messages: {
            user_username: {
                required: "Login: Username is required."
            },
            user_email: {
                required: "Login: Password is required."
            },
            user_password: {
                required: "Login: Password is required."
            }
        }
    });
});