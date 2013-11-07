<?php
    // contact defaults
    $rblGender          = rblGender('gender', $objContact->getGender());
    $optSalutations     = ddlOptions($db, $objContact->getId_salutation(), 'id', 'abrv', $objSalutations, NULL, NULL);
    $optNameSuffixes    = ddlOptions($db, $objContact->getId_name_suffix(), 'id', 'abrv', $objNameSuffixes, NULL, NULL);
    $optCompanies       = ddlOptions($db, $objContact->getID_company(), 'id', 'name', $objCompanies, NULL, NULL);
?>
