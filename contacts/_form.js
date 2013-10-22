/*
 * TODOS:
 * phone extension entered without phone
 */
$(function() {
    $( "#form_contact" ).validate({
        rules: {
            name_last: {
                required: true
            },
            company: {
                required: true
            },
            phone: {
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            phone_extension: {
                digits: true,
                minlength: 1,
                maxlength: 4
            },
            fax: {
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            contact_email: {
                email: true
            }
        },
        messages: {
            name_last: {
                required: "Contact: Last Name is required."
            },
            company: {
                required: "Contact: Company is required."
            },
            phone: {
                digits: "Numbers only for Phone",
                minlength: $.format("Phone must be {0} digits."),
                maxlength: $.format("Phone must be {0} digits.")
            },
            phone_extension: {
                digits: "Numbers only for Phone Extension",
                minlength: $.format("Phone Extension must be {0} digits."),
                maxlength: $.format("Phone Extension must be {0} digits.")
            },
            fax: {
                digits: "Numbers only for Fax",
                minlength: $.format("Fax must be {0} digits."),
                maxlength: $.format("Fax must be {0} digits.")
            },
            contact_email: {
                email: "E-mail address must be properly formatted."
            }
        }
    });
});