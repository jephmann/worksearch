<?php
    // profile defaults
    $rblGender          = rblGender("gender", $objProfile->getGender());
    $optSalutations     = ddlOptions($db, $objProfile->getId_salutation(), 'id', 'abrv', 'salutations');
    $optNameSuffixes    = ddlOptions($db, $objProfile->getId_name_suffix(), 'id', 'abrv', 'name_suffixes');
    $optStates          = ddlOptions($db, $objProfile->getAddress_state(), 'abrv', 'state', 'states');
    $optDriversStates   = ddlOptions($db, $objProfile->getDrivers_state(), 'abrv', 'state', 'states');
?>
