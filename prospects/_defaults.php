<?php
    $option_errors      = NULL;
    
    $optStates          = $inputs->ddl_options($db,
            $objProspect->getAddress_state(),
            'abrv', 'state', $objStates,
            NULL, NULL);
    if(!empty($optStates['error']))
    {
        $option_errors  .= $optStates['error'];
    }
    
    $rblRecruiter       = $inputs->rbl_truefalse("prospect_recruiter",
            $objProspect->getRecruiter());
    $rblContact         = $inputs->rbl_truefalse("contact",
            $objProspect->getContact());
    
    if(!empty($option_errors))
    {
        $objStatus->setMessage($option_errors);
        $objStatus->setClass("status_error");
    }