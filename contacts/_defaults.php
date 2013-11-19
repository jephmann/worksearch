<?php
    $option_errors      = NULL;
    
    $rblGender          = rblGender('gender', $objContact->getGender());
    
    $optSalutations     = ddlOptions($db, $objContact->getId_salutation(), 'id', 'abrv', $objSalutations, NULL, NULL);
    if(!empty($optSalutations['error']))
    {
        $option_errors .= $optSalutations['error'];
    }
    
    $optNameSuffixes    = ddlOptions($db, $objContact->getId_name_suffix(), 'id', 'abrv', $objNameSuffixes, NULL, NULL);
    if(!empty($optNameSuffixes['error']))
    {
        $option_errors .= $optNameSuffixes['error'];
    }
    
    $optCompanies       = ddlOptions($db, $objContact->getID_company(), 'id', 'name', $objCompanies, NULL, NULL);
    if(!empty($optCompanies['error']))
    {
        $option_errors .= $optCompanies['error'];
    }
    
    if(!empty($option_errors))
    {
        $objStatus->setMessage($option_errors);
        $objStatus->setClass("status_error");
    }