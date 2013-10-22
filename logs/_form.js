/*
 * TODOS:
 * full contact date or nothing
 */
$(function() {
    $( "#form_log" ).validate({
        rules: {
            week_ending: {
                required: true
            },
            contact_date_mm: {
                required: true
            },
            contact_date_dd: {
                required: true
            },
            contact_date_yyyy: {
                required: true
            },
            work: {
                required: true
            },
            company: {
                required: true
            },
            contact: {
                required: true
            },
            contact_method: {
                required: true
            },
            results: {
                required: true
            }
        },
        messages: {
            week_ending: {
                required: "Log: Week Ending is required."
            },
            contact_date_mm: {
                required: "Log: Contact Month is required."
            },
            contact_date_dd: {
                required: "Log: Contact Day is required."
            },
            contact_date_yyyy: {
                required: "Log: Contact Year is required."
            },
            work: {
                required: "Log: Type of Work Sought is required."
            },
            company: {
                required: "Log: Company is required."
            },
            contact: {
                required: "Log: Contact is required."
            },
            contact_method: {
                required: "Log: Contact Method is required."
            },
            results: {
                required: "Log: Contact Results is required."
            }            
        }
    });
});