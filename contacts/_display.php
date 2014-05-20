<?php
        
    $id_sal             = $objContact->id_salutation;
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
    
    $id_suf             = $objContact->id_name_suffix;
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
    
    $contact_salutation     = $objSalutation->abrv;    
    $contact_name_suffix    = $objNameSuffix->abrv;
    $contact_name_full      = Format::fullnameplus($contact_salutation, $objContact->name_full(), $contact_name_suffix);
    $contact_phone          = $objContact->full_phone();
    $contact_fax            = $objContact->full_fax();
    $contact_mobile_phone   = $objContact->full_mobile();
    $contact_email          = $objContact->link_email();
    $contact_linkedin       = Link::outside("Contact LinkedIn", $objContact->linkedin, $img_linkedin);
    $contact_twitter        = Link::outside("Contact Twitter", $objContact->twitter, $img_twitter);
    $contact_facebook       = Link::outside("Contact Facebook", $objContact->facebook, $img_facebook);
    $contact_googleplus     = Link::outside("Contact Google Plus", $objContact->googleplus, NULL);