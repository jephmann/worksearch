<?php
    /*
     * LOGS
     */

    $objSalutation      = new Salutation;
    $prmSalutation      = $objSalutation->id_params($objContact->id_salutation);
    $sqlSalutation      = $objSalutation->select(NULL);
    $fetchSalutation    = $objData->db_read($db, $sqlSalutation, $prmSalutation, FALSE);
    $rowSalutation      = $fetchSalutation['result'];
    if(!empty($fetchSalutation['error']))
    {
        $objStatus->setMessage("<li>Contact Salutation Error: {$fetchSalutation['error']}</li>");
        $objStatus->setColor("FF0000");
        $objStatus->setBackground_color("FFFF00");
    }
    $objSalutation->setAbrv(htmlentities($rowSalutation['abrv'], ENT_QUOTES, 'UTF-8'));
    $contact_salutation = $objSalutation->abrv;
    
    $objNameSuffix      = new Name_Suffix;
    $prmNameSuffix      = $objNameSuffix->id_params($objContact->id_name_suffix);
    $sqlNameSuffix      = $objNameSuffix->select(NULL);
    $fetchNameSuffix    = $objData->db_read($db, $sqlNameSuffix, $prmNameSuffix, FALSE);
    $rowNameSuffix      = $fetchNameSuffix['result'];
    if(!empty($fetchNameSuffix['error']))
    {
        $objStatus->setMessage("<li>Contact Suffix Error: {$fetchNameSuffix['error']}</li>");
        $objStatus->setColor("FF0000");
        $objStatus->setBackground_color("FFFF00");
    }
    $objNameSuffix->setAbrv(htmlentities($rowNameSuffix['abrv'], ENT_QUOTES, 'UTF-8'));
    $contact_name_suffix = $objNameSuffix->abrv;
    
    $contact_name_full  = returnFullNamePlus($contact_salutation, $objContact->name_full(), $contact_name_suffix);