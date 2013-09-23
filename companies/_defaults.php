<?php
    // company defaults
    $optStates      = ddlOptions($db, $objCompany->getAddress_state(), 'abrv', 'state', 'states');
    $rblRecruiter   = rblTrueFalse("recruiter", $objCompany->getRecruiter());
    $rblContact     = rblTrueFalse("contact", $objCompany->getContact());
?>
