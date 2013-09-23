<?php
    // contact defaults
    $rblGender          = rblGender('gender', $objContact->getGender());
    $optSalutations     = ddlOptions($db, $objContact->getId_salutation(), 'id', 'abrv', 'salutations');
    $optNameSuffixes    = ddlOptions($db, $objContact->getId_name_suffix(), 'id', 'abrv', 'name_suffixes');
    $optCompanies       = ddlOptions($db, $objContact->getID_company(), 'id', 'name', 'companies');
?>
