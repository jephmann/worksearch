<?php
    // Clear Status Message
    $objStatus->message = NULL;
    
    $objStatus->message .= validate_required_li($objCompany->name, "Company: Name");
    $objStatus->message .= validate_zip5_li($objCompany->address_zip5, "Company ZIP Code");
    $objStatus->message .= validate_zip4_li($objCompany->address_zip4, "Company ZIP Code Extension", $objCompany->address_zip5);
    
    // Make sure I did not add this Company/ZIP already
    if($page['mode']=='Create')
    {
        // See whether combination name and zip5 already exist
        $already_name = returnAlreadyCheck($db, 'name', $objCompany->getName(), 'companies');
        $already_zip5 = returnAlreadyCheck($db, 'address_zip5', $objCompany->getAddress_zip5(), 'companies');
        if($already_name && $already_zip5)
        {
            $objStatus->message .= validation_message("Combination company name/zip5 already exists.");
        }
    }
    
    $objStatus->message .= validate_phone_li($objCompany->phone, "Company Phone Number");
    $objStatus->message .= validate_phone_ext_li($objCompany->phone_extension, "Company Phone Extension", $objCompany->phone);    
    $objStatus->message .= validate_phone_li($objCompany->fax, "Company Fax Number");
    $objStatus->message .= validate_email_li($objCompany->email, "Company E-Mail");
    
    // NOT REQUIRED: Company E-Mail, must be unique among Companies
    /*
    if(!empty($objCompany->email))
    {
        // If the entered e-mail address is NOT unique among Companies
        if(returnAlreadyCheck($db, 'email', $objCompany->getEmail(), 'companies'))
        {
            $objStatus->message .= validation_message("This Company e-mail address already exists.");
        }
    }
     */
    
    if(!empty($objStatus->message))
    {
        $objStatus->class   = ("status_error");
    }