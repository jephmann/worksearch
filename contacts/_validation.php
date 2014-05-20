<?php
    // Clear Status Message
    $objStatus->message = NULL;
    $objStatus->message .= Validation::required_li($objContact->name_last, "Contact: Last Name");
    $objStatus->message .= Validation::required_li($objContact->id_prospect, "Contact: Prospect");    
    $objStatus->message .= Validation::phone_li($objContact->phone, "Contact: Office Phone Number");
    $objStatus->message .= Validation::phone_ext_li($objContact->phone_extension, "Contact: Office Phone Extension", $objContact->phone);   
    $objStatus->message .= Validation::phone_li($objContact->phone_mobile, "Contact: Mobile Phone Number");    
    $objStatus->message .= Validation::phone_li($objContact->fax, "Contact: Office Fax Number");
    $objStatus->message .= Validation::email_li($objContact->email, "Contact: E-Mail");
    if(!empty($objStatus->message))
    {
        $objStatus->class   = ("status_error");
    }