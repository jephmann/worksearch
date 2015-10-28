<?php
    /*
     * PROFILE back-end validation
     */

    // First, clear Status Message
    $objStatus->message = NULL;
    $objStatus->message .= Validation::required_li($objProfile->name_last, "Profile: Last Name");
    $objStatus->message .= Validation::zip5_li($objProfile->address_zip5, "Profile ZIP Code");
    $objStatus->message .= Validation::zip4_li($objProfile->address_zip4, "Profile ZIP Code Extension", $objProfile->address_zip5);    
    $objStatus->message .= Validation::phone_li($objProfile->phone, "Profile Phone Number");
    $objStatus->message .= Validation::phone_ext_li($objProfile->phone_extension, "Profile Phone Extension", $objProfile->phone);    
    $objStatus->message .= Validation::phone_li($objProfile->fax, "Profile Fax Number");    
    $objStatus->message .= Validation::phone_li($objProfile->phone_mobile, "Profile Mobile Number");
    $objStatus->message .= Validation::email_li($objProfile->email, "Profile E-Mail");    
    if(!empty($objStatus->message))
    {
        $objStatus->class   = ("status_error");
    }