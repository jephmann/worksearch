<?php
    $profile_building       = NULL;
    if (!empty($objProfile->address_building))
    {
        $profile_building   = $objProfile->address_building.'<br .>';
    }
    $profile_unit           = NULL;
    if (!empty($objProfile->address_unit))
    {
        $profile_unit       = $objProfile->address_unit.'<br .>';
    }
    $profile_zip            = formatPostUS($objProfile->address_zip5, $objProfile->address_zip4);
    $profile_csz            = $objProfile->address_city.', '.$objProfile->address_state.' '.$profile_zip;
    $profile_phone          = formatPhone($objProfile->phone, $objProfile->phone_extension);
    $profile_fax            = formatPhone($objProfile->fax, NULL);
    $profile_email          = formatEmailLink("Profile", $objProfile->email);
    $profile_drivers_license = formatDriversLicense($objProfile->drivers_state, $objProfile->drivers_license);
    $profile_social_security_number            = formatSSN($objProfile->social_security_number);
    
    echo $objProfile->phone_extension;
    
    $objSalutation      = new Salutation;
    $prmSalutation      = $objSalutation->id_params($objProfile->id_salutation, NULL);
    $sqlSalutation      = $objSalutation->select(NULL);
    $fetchSalutation    = read($db, $sqlSalutation, $prmSalutation, FALSE);
    $rowSalutation      = $fetchSalutation['result'];
    if(!empty($fetchSalutation['error']))
    {
        $objStatus->setMessage("<li>{$fetchSalutation['error']}</li>");
        $objStatus->setColor("FF0000");
        $objStatus->setBackground_color("FFFF00");
    }
    $objSalutation->setAbrv(htmlentities($rowSalutation['abrv'], ENT_QUOTES, 'UTF-8'));
    $profile_salutation = $objSalutation->abrv;
    
    $objNameSuffix      = new Name_Suffix;
    $prmNameSuffix      = $objNameSuffix->id_params($objProfile->id_name_suffix, NULL);
    $sqlNameSuffix      = $objNameSuffix->select(NULL);
    $fetchNameSuffix    = read($db, $sqlNameSuffix, $prmNameSuffix, FALSE);
    $rowNameSuffix      = $fetchNameSuffix['result'];
    if(!empty($fetchNameSuffix['error']))
    {
        $objStatus->setMessage("<li>{$fetchNameSuffix['error']}</li>");
        $objStatus->setColor("FF0000");
        $objStatus->setBackground_color("FFFF00");
    }
    $objNameSuffix->setAbrv(htmlentities($rowNameSuffix['abrv'], ENT_QUOTES, 'UTF-8'));
    $profile_name_suffix = $objNameSuffix->abrv;
    
    $profile_name_full  = returnFullNamePlus($profile_salutation, $objProfile->name_full(), $profile_name_suffix);
            
            