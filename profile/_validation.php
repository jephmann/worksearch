<?php
    // Clear Status Message
    $objStatus->message = NULL;
    
    $objStatus->message .= validate_required_li($objProfile->name_last, "Profile: Last Name");
    $objStatus->message .= validate_zip5_li($objProfile->address_zip5, "Profile ZIP Code");
    $objStatus->message .= validate_zip4_li($objProfile->address_zip4, "Profile ZIP Code Extension", $objProfile->address_zip5);
    
    $objStatus->message .= validate_phone_li($objProfile->phone, "Profile Phone Number");
    $objStatus->message .= validate_phone_ext_li($objProfile->phone_extension, "Profile Phone Extension", $objProfile->phone);    
    $objStatus->message .= validate_phone_li($objProfile->fax, "Profile Fax Number");
    $objStatus->message .= validate_email_li($objProfile->email, "Profile E-Mail");
    
    if(!empty($objStatus->message))
    {
        $objStatus->class   = ("status_error");
    }