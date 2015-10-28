<?php
    /*
     * CONTACTS
     */

    $prmContact     = $objContact->id_params($objContact->id, $objContact->id_user);
    $sqlContact     = $objContact->select($objContact->id_user);
    $fetchContact   = $objData->db_read($db, $sqlContact, $prmContact, FALSE);
    $rowContact     = $fetchContact['result'];
    if(!empty($fetchContact['error']))
    {
        $objStatus->setMessage("<li>Contact Error: {$fetchContact['error']}</li>");
        $objStatus->setClass("status_error");
    }
    // Whose Contact? 
    $objContact->setId_user(htmlentities($rowContact['id_user'], ENT_QUOTES, 'UTF-8'));
    // Who
    $objContact->setGender(htmlentities($rowContact['gender'], ENT_QUOTES, 'UTF-8'));
    $objContact->setId_salutation(htmlentities($rowContact['id_salutation'], ENT_QUOTES, 'UTF-8'));
    $objContact->setName_first(htmlentities($rowContact['name_first'], ENT_QUOTES, 'UTF-8'));
    $objContact->setName_middle(htmlentities($rowContact['name_middle'], ENT_QUOTES, 'UTF-8'));
    $objContact->setName_last(htmlentities($rowContact['name_last'], ENT_QUOTES, 'UTF-8'));
    $objContact->setId_name_suffix(htmlentities($rowContact['id_name_suffix'], ENT_QUOTES, 'UTF-8'));
    $objContact->setRemarks(htmlentities($rowContact['remarks'], ENT_QUOTES, 'UTF-8'));
    // Prospect
    $objContact->setID_prospect(htmlentities($rowContact['id_prospect'], ENT_QUOTES, 'UTF-8'));
    $objContact->setDepartment(htmlentities($rowContact['department'], ENT_QUOTES, 'UTF-8'));
    $objContact->setTitle(htmlentities($rowContact['title'], ENT_QUOTES, 'UTF-8'));
    // Communication
    $objContact->setPhone(htmlentities($rowContact['phone'], ENT_QUOTES, 'UTF-8'));
    $objContact->setPhone_extension(htmlentities($rowContact['phone_extension'], ENT_QUOTES, 'UTF-8'));
    $objContact->setPhone_mobile(htmlentities($rowContact['phone_mobile'], ENT_QUOTES, 'UTF-8'));
    $objContact->setFax(htmlentities($rowContact['fax'], ENT_QUOTES, 'UTF-8'));
    $objContact->setEmail(htmlentities($rowContact['email'], ENT_QUOTES, 'UTF-8'));
    $objContact->setSkype(htmlentities($rowContact['skype'], ENT_QUOTES, 'UTF-8'));
    // Links
    $objContact->setWebsite(htmlentities($rowContact['website'], ENT_QUOTES, 'UTF-8'));
    $objContact->setLinkedin(htmlentities($rowContact['linkedin'], ENT_QUOTES, 'UTF-8')); 
    $objContact->setTwitter(htmlentities($rowContact['twitter'], ENT_QUOTES, 'UTF-8'));  
    $objContact->setFacebook(htmlentities($rowContact['facebook'], ENT_QUOTES, 'UTF-8'));  
    $objContact->setGoogleplus(htmlentities($rowContact['googleplus'], ENT_QUOTES, 'UTF-8'));