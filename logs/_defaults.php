<?php
    $optWeekEnding      = optWeeks('Saturday', $objLog->getWeek_ending());
    $optContactDateMM   = optMonths($objLog->contact_month());
    $optContactDateDD   = optDays($objLog->contact_day());
    $optContactDateYYYY = optYears($objLog->contact_year());
    $optCompanies       = ddlOptions($objLog->getId_company(), 'id', 'name', 'companies', $db);
    $rblContactMethods  = rblOptions($objLog->getId_contact_method(), 'contact_method', 'name', 'id', 'contact_methods', $db, 'v');
    $concatContactNames = ("UPPER(name_last), ' ', name_first, ' ', name_middle, ' ', name_suffix");
    $sortContactNames   = ("name_last, name_first, name_middle");
    $optContacts        = ddlOptionsAs($objLog->getId_contact(), 'id', $concatContactNames, 'name', $sortContactNames, 'contacts', $db);
?>
