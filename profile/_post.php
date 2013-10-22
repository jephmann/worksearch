<?php    
    $profile_gender     = NULL;
    if(isset($_POST['gender']))
    {
        $profile_gender = $_POST['gender'];
    }
    
    $birth_date         = NULL;
    $birth_date_yyyy    = ($_POST['birth_date_yyyy']);
    $birth_date_mm      = ($_POST['birth_date_mm']);
    $birth_date_dd      = ($_POST['birth_date_dd']);
    if((!empty($birth_date_yyyy)) && (!empty($birth_date_mm)) && (!empty($birth_date_dd)))
    {
        $birth_date     = new DateTime($birth_date_yyyy.'-'.$birth_date_mm.'-'.$birth_date_dd);
        $birth_date     = $birth_date->format('Y-m-d');
    }
    
    /*
     * NEVER set/reset $object->id_user via POST
     */
    // Who Are You
    $objProfile->setGender($profile_gender);
    $objProfile->setId_salutation($_POST['salutation']);
    $objProfile->setName_first(ucwords(strtolower(trim($_POST['name_first']))));
    $objProfile->setName_middle(ucwords(strtolower(trim($_POST['name_middle']))));
    $objProfile->setName_last(ucwords(strtolower(trim($_POST['name_last']))));
    $objProfile->setId_name_suffix($_POST['name_suffix']);
    $objProfile->setDate_birth($birth_date);
    
    // Address
    $objProfile->setAddress_building(ucwords(strtolower(trim($_POST['address_building']))));
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
    $objProfile->setEmail(strtolower(trim($_POST['profile_email'])));
    // Identification
    $objProfile->setSocial_security_number($_POST['social_security_number']);
    $objProfile->setDrivers_state($_POST['drivers_state']);
    $objProfile->setDrivers_license($_POST['drivers_license']);