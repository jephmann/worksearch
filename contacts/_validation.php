<?php
    // Clear Status Message
    $objStatus->message = NULL;
    
    $objStatus->message .= validate_required_li($objContact->name_last, "Contact: Last Name");
    $objStatus->message .= validate_required_li($objContact->id_company, "Contact: Company");    
    $objStatus->message .= validate_phone_li($objContact->phone, "Contact Phone Number");
    $objStatus->message .= validate_phone_ext_li($objContact->phone_extension, "Contact Phone Extension", $objContact->phone);    
    $objStatus->message .= validate_phone_li($objContact->fax, "Contact Fax Number");
    $objStatus->message .= validate_email_li($objContact->email, "Contact E-Mail");
    
    // NOT REQUIRED: Contact E-Mail, must be unique among Contacts
    /*
    if(!empty($objContact->email))
    {
        // If the entered e-mail address is NOT unique among Contacts
        if(returnAlreadyCheck($db, 'email', $objContact->email, 'contacts'))
        {
            $objStatus->message .= validation_message("This Contact e-mail address already exists.");
        }
    }
     */
    
    if(!empty($objStatus->message))
    {
        $objStatus->class   = ("status_error");
    }