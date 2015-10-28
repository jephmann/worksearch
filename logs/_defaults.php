<?php
    /*
     * LOGS
     */

    $option_errors      = NULL;
    
    $optWeekEnding      = Input::ddl_weeks('Saturday', $objLog->getWeek_ending());
    $optContactDateMM   = Input::ddl_months($objLog->contact_month());
    $optContactDateDD   = Input::ddl_days($objLog->contact_day());
    $optContactDateYYYY = Input::ddl_years($objLog->contact_year());
    
    $optProspects       = Input::ddl_options($db,
        $objLog->getId_prospect(),
        'id', 'name', $objProspects,
        'name, \' \', UPPER(branch)',
        'name ASC, branch ASC');
    if(!empty($optProspects['error']))
    {
        $option_errors .= $optProspects['error'];
    }
    
    $rblContactMethods  = Input::rbl_options($db,
        $objLog->getId_contact_method(),
        'contact_method', 'name', 'id',
        $objContactMethods, TRUE);
    if(!empty($rblContactMethods['error']))
    {
        $option_errors .= $rblContactMethods['error'];
    }
    
    $concatContactNames = ("name_first, ' ', name_middle, ' ', name_last");
    $sortContactNames   = ("name_last, name_first, name_middle");
    $optContacts        = Input::ddl_options($db,
        $objLog->getId_contact(),
        'id', 'name', $objContacts,
        $concatContactNames, $sortContactNames);    
    if(!empty($optContacts['error']))
    {
        $option_errors .= $optContacts['error'];
    }
    
    if(!empty($option_errors))
    {
        $objStatus->setMessage($option_errors);
        $objStatus->setClass("status_error");
    }
    
    /**
     * TODO 2014.04.12
     * "A million years ago" w/ JavaScript (but in Classic ASP),
     * I tied two dropdownlists together,
     * wherein the selection of the first ddl 
     * narrowed the option of the second ddl.
     * I would like to use the Prospects ddl
     * to narrow the Contacts ddl.
     */
    