<?php
    $option_errors      = NULL;
    
    $rblGender          = $inputs->rbl_gender("gender", $objProfile->getGender());
    $optBirthDateMM     = $inputs->ddl_months($objProfile->birth_month());
    $optBirthDateDD     = $inputs->ddl_days($objProfile->birth_day());
    $optBirthDateYYYY   = $inputs->ddl_years($objProfile->birth_year());
    
    $optSalutations     = $inputs->ddl_options($db,
            $objProfile->getId_salutation(),
            'id', 'abrv', $objSalutations,
            NULL, NULL);
    if(!empty($optSalutations['error']))
    {
        $option_errors .= $optSalutations['error'];
    }
    
    $optNameSuffixes    = $inputs->ddl_options($db,
            $objProfile->getId_name_suffix(),
            'id', 'abrv', $objNameSuffixes,
            NULL, NULL);
    if(!empty($optNameSuffixes['error']))
    {
        $option_errors .= $optNameSuffixes['error'];
    }
    
    $optStates          = $inputs->ddl_options($db,
            $objProfile->getAddress_state(),
            'abrv', 'state', $objStates,
            NULL, NULL);
    if(!empty($optStates['error']))
    {
        $option_errors .= $optStates['error'];
    }
    
    $optDriversStates   = $inputs->ddl_options($db,
            $objProfile->getDrivers_state(),
            'abrv', 'state', $objStates,
            NULL, NULL);
    if(!empty($optDriversStates['error']))
    {
        $option_errors .= $optDriversStates['error'];
    }
    
    if(!empty($option_errors))
    {
        $objStatus->setMessage($option_errors);
        $objStatus->setClass("status_error");
    }