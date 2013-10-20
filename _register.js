$(function() {
    $( "#form_register" ).validate({
        rules: {
            user_username: {
                required: true
            },
            user_email: {
                required: true,
                email: true
            },
            user_password: {
                required: true
            }
        },
        messages: {
            user_username: {
                required: "Register: Username is required."
            },
            user_email: {
                required: "Register: E-Mail is required.",
                email: "E-mail address must be formatted properly."
            },
            user_password: {
                required: "Register: Password is required."
            }
        }
    });
});