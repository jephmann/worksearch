<?php
    $option_errors      = NULL;
    
    $optWeekEnding      = optWeeks('Saturday', $objLog->getWeek_ending());
    $optContactDateMM   = optMonths($objLog->contact_month());
    $optContactDateDD   = optDays($objLog->contact_day());
    $optContactDateYYYY = optYears($objLog->contact_year());
    
    $optProspects       = ddlOptions($db, $objLog->getId_prospect(), 'id', 'name', $objProspects, 'name, \' \', UPPER(branch)', 'name ASC, branch ASC');
    if(!empty($optProspects['error']))
    {
        $option_errors .= $optProspects['error'];
    }
    
    $rblContactMethods  = rblOptions($db, $objLog->getId_contact_method(), 'contact_method', 'name', 'id', $objContactMethods, 'v');
    if(!empty($rblContactMethods['error']))
    {
        $option_errors .= $rblContactMethods['error'];
    }
    
    $concatContactNames = ("name_first, ' ', name_middle, ' ', name_last");
    $sortContactNames   = ("name_last, name_first, name_middle");
    $optContacts        = ddlOptions($db, $objLog->getId_contact(), 'id', 'name', $objContacts, $concatContactNames, $sortContactNames);    
    if(!empty($optContacts['error']))
    {
        $option_errors .= $optContacts['error'];
    }
    
    if(!empty($option_errors))
    {
        $objStatus->setMessage($option_errors);
        $objStatus->setClass("status_error");
    }