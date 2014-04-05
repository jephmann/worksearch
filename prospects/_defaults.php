<?php
    $option_errors      = NULL;
    
    $optStates          = ddlOptions($db, $objProspect->getAddress_state(), 'abrv', 'state', $objStates, NULL, NULL);
    if(!empty($optStates['error']))
    {
        $option_errors  .= $optStates['error'];
    }
    
    $rblRecruiter       = rblTrueFalse("prospect_recruiter", $objProspect->getRecruiter());
    $rblContact         = rblTrueFalse("contact", $objProspect->getContact());
    
    if(!empty($option_errors))
    {
        $objStatus->setMessage($option_errors);
        $objStatus->setClass("status_error");
    }