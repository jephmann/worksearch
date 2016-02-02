<?php
    /*
     * PROFILE
     */

    $option_errors      = NULL;
    
    $optGender          = Input::rbl_gender("gender", $objProfile->getGender());
    $optBirthDateMM     = Input::ddl_months($objProfile->birth_month());
    $optBirthDateDD     = Input::ddl_days($objProfile->birth_day());
    $optBirthDateYYYY   = Input::ddl_years($objProfile->birth_year());
    
    $optSalutations     = Input::ddl_options($db,
        $objProfile->getId_salutation(),
        'id', 'abrv', $objSalutations);
    if(!empty($optSalutations['error']))
    {
        $option_errors .= $optSalutations['error'];
    }
    
    $optNameSuffixes    = Input::ddl_options($db,
        $objProfile->getId_name_suffix(),
        'id', 'abrv', $objNameSuffixes);
    if(!empty($optNameSuffixes['error']))
    {
        $option_errors .= $optNameSuffixes['error'];
    }
    
    $optStates          = Input::ddl_options($db,
        $objProfile->getAddress_state(),
        'abrv', 'state', $objStates);
    if(!empty($optStates['error']))
    {
        $option_errors .= $optStates['error'];
    }
    
    $optDriversStates   = Input::ddl_options($db,
        $objProfile->getDrivers_state(),
        'abrv', 'state', $objStates);
    if(!empty($optDriversStates['error']))
    {
        $option_errors .= $optDriversStates['error'];
    }
    
    if(!empty($option_errors))
    {
        $objStatus->setMessage($option_errors);
        $objStatus->setClass("status_error");
    }