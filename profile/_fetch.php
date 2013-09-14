<?php    
    $rowProfile = fetchRow($db, $objProfile, $id);
    // Who Are You
    $objProfile->setGender(htmlentities($rowProfile['gender'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setId_salutation(htmlentities($rowProfile['id_salutation'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setName_first(htmlentities($rowProfile['name_first'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setName_middle(htmlentities($rowProfile['name_middle'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setName_last(htmlentities($rowProfile['name_last'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setName_suffix(htmlentities($rowProfile['name_suffix'], ENT_QUOTES, 'UTF-8'));
    // Address
    $objProfile->setAddress_street(htmlentities($rowProfile['address_street'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setAddress_unit(htmlentities($rowProfile['address_unit'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setAddress_city(htmlentities($rowProfile['address_city'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setAddress_state(htmlentities($rowProfile['address_state'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setAddress_zip5(htmlentities($rowProfile['address_zip5'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setAddress_zip4(htmlentities($rowProfile['address_zip4'], ENT_QUOTES, 'UTF-8'));
    // Communication
    $objProfile->setPhone(htmlentities($rowProfile['phone'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setFax(htmlentities($rowProfile['fax'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setEmail(htmlentities($rowProfile['email'], ENT_QUOTES, 'UTF-8'));
    // Identification
    $objProfile->setSocial_security_number(htmlentities($rowProfile['social_security_number'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setDrivers_state(htmlentities($rowProfile['drivers_state'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setDrivers_license(htmlentities($rowProfile['drivers_license'], ENT_QUOTES, 'UTF-8'));