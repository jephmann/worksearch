<?php
    /*
     * PROFILE
     */

    $prmProfile     = $objProfile->id_params($objProfile->id, $objProfile->id_user);
    $sqlProfile     = $objProfile->select($objProfile->id_user);
    $fetchProfile   = $objData->db_read($db, $sqlProfile, $prmProfile, FALSE);
    $rowProfile     = $fetchProfile['result'];
    if(!empty($fetchProfile['error']))
    {
        $objStatus->setMessage("<li>{$fetchProfile['error']}</li>");
        $objStatus->setClass("status_error");
    }
    // Who Are You
    $objProfile->setGender(htmlentities($rowProfile['gender'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setId_salutation(htmlentities($rowProfile['id_salutation'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setName_first(htmlentities($rowProfile['name_first'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setName_middle(htmlentities($rowProfile['name_middle'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setName_last(htmlentities($rowProfile['name_last'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setId_name_suffix(htmlentities($rowProfile['id_name_suffix'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setDate_birth(htmlentities($rowProfile['date_birth'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setRemarks(htmlentities($rowProfile['remarks'], ENT_QUOTES, 'UTF-8'));
    // Address
    $objProfile->setAddress_building(htmlentities($rowProfile['address_building'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setAddress_street(htmlentities($rowProfile['address_street'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setAddress_unit(htmlentities($rowProfile['address_unit'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setAddress_city(htmlentities($rowProfile['address_city'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setAddress_state(htmlentities($rowProfile['address_state'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setAddress_zip5(htmlentities($rowProfile['address_zip5'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setAddress_zip4(htmlentities($rowProfile['address_zip4'], ENT_QUOTES, 'UTF-8'));
    // Communication
    $objProfile->setPhone(htmlentities($rowProfile['phone'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setPhone_extension(htmlentities($rowProfile['phone_extension'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setPhone_mobile(htmlentities($rowProfile['phone_mobile'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setFax(htmlentities($rowProfile['fax'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setEmail(htmlentities($rowProfile['email'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setSkype(htmlentities($rowProfile['skype'], ENT_QUOTES, 'UTF-8'));
    // Identification
    $objProfile->setSocial_security_number(htmlentities($rowProfile['social_security_number'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setDrivers_state(htmlentities($rowProfile['drivers_state'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setDrivers_license(htmlentities($rowProfile['drivers_license'], ENT_QUOTES, 'UTF-8'));
