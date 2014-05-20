<?php
    // Clear Status Message
    $objStatus->message = NULL;
    $objStatus->message .= Validation::required_li($objProspect->name, "Prospect: Name");
    $objStatus->message .= Validation::zip5_li($objProspect->address_zip5, "Prospect ZIP Code");
    $objStatus->message .= Validation::zip4_li($objProspect->address_zip4, "Prospect ZIP Code Extension", $objProspect->address_zip5);    
    $objStatus->message .= Validation::phone_li($objProspect->phone, "Prospect Phone Number");
    $objStatus->message .= Validation::phone_ext_li($objProspect->phone_extension, "Prospect Phone Extension", $objProspect->phone);    
    $objStatus->message .= Validation::phone_li($objProspect->fax, "Prospect Fax Number");
    $objStatus->message .= Validation::email_li($objProspect->email, "Prospect E-Mail");    
    if(!empty($objStatus->message))
    {
        $objStatus->class   = ("status_error");
    }