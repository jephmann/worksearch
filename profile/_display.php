<?php
    
    $id_sal             = $objProfile->id_salutation;
    $objSalutation      = new Salutation;
    if($id_sal != 0)
    {
        $prmSalutation      = $objSalutation->id_params($id_sal, NULL);
        $sqlSalutation      = $objSalutation->select(NULL);
        $fetchSalutation    = $objData->db_read($db, $sqlSalutation, $prmSalutation, FALSE);
        $rowSalutation      = $fetchSalutation['result'];
        if(!empty($fetchSalutation['error']))
        {
            $objStatus->setMessage("<li>{$fetchSalutation['error']}</li>");
            $objStatus->setColor("FF0000");
            $objStatus->setBackground_color("FFFF00");
        }
        $objSalutation->setAbrv(htmlentities($rowSalutation['abrv'], ENT_QUOTES, 'UTF-8'));
    }
    
    $id_suf             = $objProfile->id_name_suffix;
    $objNameSuffix      = new Name_Suffix;
    if($id_suf != 0)
    {
        $prmNameSuffix      = $objNameSuffix->id_params($id_suf, NULL);
        $sqlNameSuffix      = $objNameSuffix->select(NULL);
        $fetchNameSuffix    = $objData->db_read($db, $sqlNameSuffix, $prmNameSuffix, FALSE);
        $rowNameSuffix      = $fetchNameSuffix['result'];
        if(!empty($fetchNameSuffix['error']))
        {
            $objStatus->setMessage("<li>{$fetchNameSuffix['error']}</li>");
            $objStatus->setColor("FF0000");
            $objStatus->setBackground_color("FFFF00");
        }
        $objNameSuffix->setAbrv(htmlentities($rowNameSuffix['abrv'], ENT_QUOTES, 'UTF-8'));
    }
    
    $profile_salutation             = $objSalutation->abrv;
    $profile_name_suffix            = $objNameSuffix->abrv;    
    $profile_name_full              = Format::fullnameplus($profile_salutation, $objProfile->name_full(), $profile_name_suffix);
    $profile_building               = NULL;
    if (!empty($objProfile->address_building))
    {
        $profile_building           = $objProfile->address_building.'<br .>';
    }
    $profile_unit                   = NULL;
    if (!empty($objProfile->address_unit))
    {
        $profile_unit               = $objProfile->address_unit.'<br .>';
    }
    $profile_zip                    = $objProfile->full_zip();
    $profile_csz                    = $objProfile->address_city.', '.$objProfile->address_state.' '.$profile_zip;
    $profile_phone                  = $objProfile->full_phone();
    $profile_mobile                 = $objProfile->full_mobile();
    $profile_fax                    = $objProfile->full_fax();
    $profile_email                  = $objProfile->link_email();
    $profile_skype                  = $objProfile->skype;
    $profile_drivers_license        = $objProfile->full_dl();
    $profile_social_security_number = $objProfile->full_ssn();
            
            