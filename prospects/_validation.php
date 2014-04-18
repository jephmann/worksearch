<?php
    // Clear Status Message
    $objStatus->message = NULL;
    
    $objStatus->message .= $validate->required_li($objProspect->name, "Prospect: Name");
    $objStatus->message .= $validate->zip5_li($objProspect->address_zip5, "Prospect ZIP Code");
    $objStatus->message .= $validate->zip4_li($objProspect->address_zip4, "Prospect ZIP Code Extension", $objProspect->address_zip5);
    
    // Make sure I did not add this Prospect/ZIP already [seems to be broken; prospect name w/ different ZIP gets blocked]
    /*
    if($page['mode']=='Create')
    {
        // See whether combination name and zip5 already exist
        $already_name = $objData->record_exists($db, 'name', $objProspect->getName(), 'prospects');
        $already_zip5 = $objData->record_exists($db, 'address_zip5', $objProspect->getAddress_zip5(), 'prospects');
        if($already_name && $already_zip5)
        {
            $objStatus->message .= validation_message("Combination prospect name/zip5 already exists.");
        }
    }
     */
    
    $objStatus->message .= $validate->phone_li($objProspect->phone, "Prospect Phone Number");
    $objStatus->message .= $validate->phone_ext_li($objProspect->phone_extension, "Prospect Phone Extension", $objProspect->phone);    
    $objStatus->message .= $validate->phone_li($objProspect->fax, "Prospect Fax Number");
    $objStatus->message .= $validate->email_li($objProspect->email, "Prospect E-Mail");
    
    // NOT REQUIRED: Prospect E-Mail, must be unique among Prospects
    /*
    if(!empty($objProspect->email))
    {
        // If the entered e-mail address is NOT unique among Prospects
        if($objData->record_exists($db, 'email', $objProspect->getEmail(), 'prospects'))
        {
            $objStatus->message .= validation_message("This Prospect e-mail address already exists.");
        }
    }
     */
    
    if(!empty($objStatus->message))
    {
        $objStatus->class   = ("status_error");
    }