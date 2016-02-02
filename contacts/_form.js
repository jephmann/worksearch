/*
 * CONTACTS
 * TODOS:
 * phone extension entered without phone
 */
$(function() {
    $( "#form_contact" ).validate({
        rules: {
            name_last: {
                required: true
            },
            prospect: {
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
                maxlength: 5
            },
            phone_mobile: {
                digits: true,
                minlength: 10,
                maxlength: 10
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
            prospect: {
                required: "Contact: Prospect is required."
            },
            phone: {
                digits: "Numbers only for Office Phone",
                minlength: $.format("Office Phone must be {0} digits."),
                maxlength: $.format("Office Phone must be {0} digits.")
            },
            phone_extension: {
                digits: "Numbers only for Office Phone Extension",
                minlength: $.format("Office Phone Extension must be {0} digits."),
                maxlength: $.format("Office Phone Extension must be {0} digits.")
            },
            fax: {
                digits: "Numbers only for Office Fax",
                minlength: $.format("Office Fax must be {0} digits."),
                maxlength: $.format("Office Fax must be {0} digits.")
            },
            phone_mobile: {
                digits: "Numbers only for Mobile Phone",
                minlength: $.format("Mobile Phone must be {0} digits."),
                maxlength: $.format("Mobile Phone must be {0} digits.")
            },
            contact_email: {
                email: "E-mail address must be properly formatted."
            }
        }
    });
});