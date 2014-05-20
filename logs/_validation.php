<?php
    // Clear Status Message
    $objStatus->message = NULL;
    $objStatus->message .= Validation::required_li($objLog->week_ending, "Log: Week Ending");
    $objStatus->message .= Validation::required_li($contact_date_mm, "Log: Contact Month");
    $objStatus->message .= Validation::required_li($contact_date_dd, "Log: Contact Day");
    $objStatus->message .= Validation::required_li($contact_date_yyyy, "Log: Contact Year");
    $objStatus->message .= Validation::required_li($objLog->work, "Log: Type of Work Sought");
    $objStatus->message .= Validation::required_li($objLog->id_prospect, "Log: Prospect");
    $objStatus->message .= Validation::required_li($objLog->id_contact, "Log: Contact");
    $objStatus->message .= Validation::required_li($objLog->id_contact_method, "Log: Contact Method");
    $objStatus->message .= Validation::required_li($objLog->results, "Log: Result");    
    if(!empty($objStatus->message))
    {
        $objStatus->class   = ("status_error");
    }