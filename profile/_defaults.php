<?php
    $option_errors      = NULL;
    
    $rblGender          = rblGender("gender", $objProfile->getGender());
    $optBirthDateMM     = optMonths($objProfile->birth_month());
    $optBirthDateDD     = optDays($objProfile->birth_day());
    $optBirthDateYYYY   = optYears($objProfile->birth_year());
    
    $optSalutations     = ddlOptions($db, $objProfile->getId_salutation(), 'id', 'abrv', $objSalutations, NULL, NULL);
    if(!empty($optSalutations['error']))
    {
        $option_errors .= $optSalutations['error'];
    }
    
    $optNameSuffixes    = ddlOptions($db, $objProfile->getId_name_suffix(), 'id', 'abrv', $objNameSuffixes, NULL, NULL);
    if(!empty($optNameSuffixes['error']))
    {
        $option_errors .= $optNameSuffixes['error'];
    }
    
    $optStates          = ddlOptions($db, $objProfile->getAddress_state(), 'abrv', 'state', $objStates, NULL, NULL);
    if(!empty($optStates['error']))
    {
        $option_errors .= $optStates['error'];
    }
    
    $optDriversStates   = ddlOptions($db, $objProfile->getDrivers_state(), 'abrv', 'state', $objStates, NULL, NULL);
    if(!empty($optDriversStates['error']))
    {
        $option_errors .= $optDriversStates['error'];
    }
    
    if(!empty($option_errors))
    {
        $objStatus->setMessage($option_errors);
        $objStatus->setClass("status_error");
    }