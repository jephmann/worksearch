<?php
    $status['message'] = NULL;

    // Ensure a Name for the Company
    if(empty($objCompany->name))
    {
        $status['message'] .= ("<li>Please enter a name for this Company</li>");
    }
    
    if($page['mode']=='Create')
    {
        // See whether combination name and zip5 already exist
        $already_name = returnAlreadyCheck($db, 'name', $objCompany->getName(), 'companies');
        $already_zip5 = returnAlreadyCheck($db, 'address_zip5', $objCompany->getAddress_zip5(), 'companies');
        if($already_name && $already_zip5)
        {
            $status['message'] .= ("<li>Combination company name/zip5 already exists.</li>"); 
        }
    }
    
    // Not required, but Emails must be tested
    if(!empty($objCompany->email))
    {
        // If the e-mail address is NOT valid (i.e. properly formatted)
        if(!filter_var($objCompany->getEmail(), FILTER_VALIDATE_EMAIL))
        {
            $status['message'] .= ("<li>Invalid e-mail address.</li>");
        }
        // If the entered e-mail address is NOT unique among organizations
        if(returnAlreadyCheck($db, 'email', $objCompany->getEmail(), 'companies'))
        {
            $status['message'] .= ("<li>This Company e-mail address already exists.</li>");
        }
    }
    
    if(!empty($status['message']))
    {
        $status['color']            = ("CC6666");
        $status['background-color'] = ("FFFFCC");
    }