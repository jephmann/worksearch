<?php
    $option_errors      = NULL;
    
    $optStates          = ddlOptions($db, $objCompany->getAddress_state(), 'abrv', 'state', $objStates, NULL, NULL);
    if(!empty($optStates['error']))
    {
        $option_errors  .= $optStates['error'];
    }
    
    $rblRecruiter       = rblTrueFalse("company_recruiter", $objCompany->getRecruiter());
    $rblContact         = rblTrueFalse("contact", $objCompany->getContact());
    
    if(!empty($option_errors))
    {
        $objStatus->setMessage($option_errors);
        $objStatus->setClass("status_error");
    }