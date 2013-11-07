<?php
    // profile defaults
    $rblGender          = rblGender("gender", $objProfile->getGender());
    $optBirthDateMM     = optMonths($objProfile->birth_month());
    $optBirthDateDD     = optDays($objProfile->birth_day());
    $optBirthDateYYYY   = optYears($objProfile->birth_year());
    $optSalutations     = ddlOptions($db, $objProfile->getId_salutation(), 'id', 'abrv', $objSalutations, NULL, NULL);
    $optNameSuffixes    = ddlOptions($db, $objProfile->getId_name_suffix(), 'id', 'abrv', $objNameSuffixes, NULL, NULL);
    $optStates          = ddlOptions($db, $objProfile->getAddress_state(), 'abrv', 'state', $objStates, NULL, NULL);
    $optDriversStates   = ddlOptions($db, $objProfile->getDrivers_state(), 'abrv', 'state', $objStates, NULL, NULL);
?>
