<?php
    /*
     * PROSPECTS
     */

    $option_errors      = NULL;
    
    $optStates          = Input::ddl_options($db,
        $objProspect->getAddress_state(),
        'abrv', 'state', $objStates);
    if(!empty($optStates['error']))
    {
        $option_errors  .= $optStates['error'];
    }
    
    $rblRecruiter       = Input::rbl_truefalse("prospect_recruiter",
        $objProspect->getRecruiter());
    $rblContact         = Input::rbl_truefalse("contact",
        $objProspect->getContact());
    
    if(!empty($option_errors))
    {
        $objStatus->setMessage($option_errors);
        $objStatus->setClass("status_error");
    }