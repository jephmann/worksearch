/*
 * TODOS:
 * zip4 entered without zip5
 * phone extension entered without phone
 */
$(function() {
    $( "#form_company" ).validate({
        rules: {
            company_name: {
                required: true
            },
            address_zip5: {
                digits: true,
                minlength: 5,
                maxlength: 5
            },
            address_zip4: {
                digits: true,
                minlength: 4,
                maxlength: 4
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
            company_email: {
                email: true
            }
        },
        messages: {
            company_name: {
                required: "Company: Name is required."
            },
            address_zip5: {
                digits: "Numbers only for Zip Code",
                minlength: $.format("Zip Code must be {0} digits."),
                maxlength: $.format("Zip Code must be {0} digits.")
            },
            address_zip4: {
                digits: "Numbers only for Zip Code Extension",
                minlength: $.format("Zip Code Extension must be {0} digits."),
                maxlength: $.format("Zip Code Extension must be {0} digits.")
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
            company_email: {
                email: "E-mail address must be properly formatted."
            }
        }
    });
});