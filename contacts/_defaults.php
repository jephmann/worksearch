<?php   
    $rblGender          = rblGender("gender", $objContact->getGender());
    $optSalutations     = ddlOptions($objContact->getId_salutation(), 'id', 'abrv', 'salutations', $db);
    $optCompanies       = ddlOptions($objContact->getID_company(), 'id', 'name', 'companies', $db);
?>
