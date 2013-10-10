<?php
    // Clear Status Message
    $objStatus->message = NULL;
    
    $objStatus->message .= validate_required_li($objLog->week_ending, "Log: Week Ending");
    $objStatus->message .= validate_required_li($contact_date_mm, "Log: Contact Month");
    $objStatus->message .= validate_required_li($contact_date_dd, "Log: Contact Day");
    $objStatus->message .= validate_required_li($contact_date_yyyy, "Log: Contact Year");
    $objStatus->message .= validate_required_li($objLog->work, "Log: Type of Work Sought");
    $objStatus->message .= validate_required_li($objLog->id_company, "Log: Company");
    $objStatus->message .= validate_required_li($objLog->id_contact, "Log: Contact");
    $objStatus->message .= validate_required_li($objLog->id_contact_method, "Log: Contact Method");
    $objStatus->message .= validate_required_li($objLog->results, "Log: Result");
    
    // Red text, yellow background
    if(!empty($objStatus->message))
    {
        $objStatus->color                = ("CC6666");
        $objStatus->background_color     = ("FFFFCC");
    }