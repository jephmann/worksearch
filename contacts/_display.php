<?php
        
    $id_sal             = $objContact->id_salutation;
    $objSalutation      = new Salutation;
    if($id_sal != 0)
    {
        $prmSalutation      = $objSalutation->id_params($id_sal, NULL);
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
    }
    
    $id_suf             = $objContact->id_name_suffix;
    $objNameSuffix      = new Name_Suffix;
    if($id_suf != 0)
    {
        $prmNameSuffix      = $objNameSuffix->id_params($id_suf, NULL);
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
    }
    
    $contact_salutation     = $objSalutation->abrv;    
    $contact_name_suffix    = $objNameSuffix->abrv;
    $contact_name_full      = returnFullNamePlus($contact_salutation, $objContact->name_full(), $contact_name_suffix);
    $contact_phone          = $objContact->full_phone();
    $contact_fax            = $objContact->full_fax();
    $contact_email          = formatEmailLink("Contact", $objContact->email);
    $contact_linkedin       = formatOutsideLink("Contact LinkedIn", $objContact->linkedin, NULL);
    $contact_twitter        = formatOutsideLink("Contact Twitter", $objContact->twitter, NULL);
    $contact_facebook       = formatOutsideLink("Contact Facebook", $objContact->facebook, NULL);
    $contact_googleplus     = formatOutsideLink("Contact Google Plus", $objContact->googleplus, NULL);