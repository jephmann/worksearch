<?php
    /*
     * NEVER set/reset $object->id_user via POST
     */
    // Who Are You
    $objProfile->setGender($_POST['gender']);
    $objProfile->setId_salutation($_POST['salutation']);
    $objProfile->setName_first(ucwords(strtolower(trim($_POST['name_first']))));
    $objProfile->setName_middle(ucwords(strtolower(trim($_POST['name_middle']))));
    $objProfile->setName_last(ucwords(strtolower(trim($_POST['name_last']))));
    $objProfile->setName_suffix(ucwords(strtolower(trim($_POST['name_suffix']))));
    // Address
    $objProfile->setAddress_street(ucwords(strtolower(trim($_POST['address_street']))));
    $objProfile->setAddress_unit(ucwords(trim($_POST['address_unit'])));
    $objProfile->setAddress_city(ucwords(strtolower(trim($_POST['address_city']))));
    $objProfile->setAddress_state($_POST['address_state']);
    $objProfile->setAddress_zip5($_POST['address_zip5']);
    $objProfile->setAddress_zip4($_POST['address_zip4']);
    // Communication
    $objProfile->setPhone($_POST['phone']);
    $objProfile->setPhone_extension($_POST['phone_extension']);
    $objProfile->setFax($_POST['fax']);
    $objProfile->setEmail(strtolower(trim($_POST['email'])));
    // Identification
    $objProfile->setSocial_security_number($_POST['social_security_number']);
    $objProfile->setDrivers_state($_POST['drivers_state']);
    $objProfile->setDrivers_license($_POST['drivers_license']);