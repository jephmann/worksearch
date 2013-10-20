<?php
    // company defaults
    $optStates      = ddlOptions($db, $objCompany->getAddress_state(), 'abrv', 'state', 'states');
    $rblRecruiter   = rblTrueFalse("company_recruiter", $objCompany->getRecruiter());
    $rblContact     = rblTrueFalse("contact", $objCompany->getContact());
?>
