$(function() {
    $( "#form_profile" ).validate({
        rules: {
            name_last: {
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
            social_security_number: {
                digits: true,
                minlength: 9,
                maxlength: 9
            },
            drivers_license: {
                minlength: 12,
                maxlength: 12
            }
        },
        messages: {
            name_last: {
                required: "Profile: Last Name is required."
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
            social_security_number: {
                digits: "Numbers only for Social Security Number",
                minlength: $.format("Social Security Number must be {0} digits."),
                maxlength: $.format("Social Security Number must be {0} digits.")
            },
            drivers_license: {
                minlength: $.format("Drivers License must be {0} alpha-numberic characters, no spaces."),
                maxlength: $.format("Drivers License must be {0} alpha-numberic characters, no spaces.")
            }
        }
    });
});