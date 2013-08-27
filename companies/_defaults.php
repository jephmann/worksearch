<?php
    $optStates      = ddlOptions($objCompany->getAddress_state(), 'abrv', 'state', 'states', $db);
    $rblRecruiter   = rblTrueFalse("recruiter", $objCompany->getRecruiter());
    $rblContact     = rblTrueFalse("contact", $objCompany->getContact());
?>
