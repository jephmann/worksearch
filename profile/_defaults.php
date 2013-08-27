<?php
    // profile
    
    $rblGender          = rblGender("gender", $objProfile->getGender());
    $optSalutations     = ddlOptions($objProfile->getId_salutation(), 'id', 'abrv', 'salutations', $db);
    $optStates          = ddlOptions($objProfile->getAddress_state(), 'abrv', 'state', 'states', $db);
    $optDriversStates   = ddlOptions($objProfile->getDrivers_state(), 'abrv', 'state', 'states', $db);
?>
