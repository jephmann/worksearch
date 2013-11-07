<?php
    $optWeekEnding      = optWeeks('Saturday', $objLog->getWeek_ending());
    $optContactDateMM   = optMonths($objLog->contact_month());
    $optContactDateDD   = optDays($objLog->contact_day());
    $optContactDateYYYY = optYears($objLog->contact_year());
    $optCompanies       = ddlOptions($db, $objLog->getId_company(), 'id', 'name', $objCompanies, NULL, NULL);
    $rblContactMethods  = rblOptions($db, $objLog->getId_contact_method(), 'contact_method', 'name', 'id', $objContactMethods, 'v');
    $concatContactNames = ("name_first, ' ', name_middle, ' ', name_last");
    $sortContactNames   = ("name_last, name_first, name_middle");
    $optContacts        = ddlOptions($db, $objLog->getId_contact(), 'id', 'name', $objContacts, $concatContactNames, $sortContactNames);