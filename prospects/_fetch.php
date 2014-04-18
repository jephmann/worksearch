<?php
    $prmProspect     = $objProspect->id_params($objProspect->id, $objProspect->id_user);
    $sqlProspect     = $objProspect->select($objProspect->id_user);
    $fetchProspect   = $objData->db_read($db, $sqlProspect, $prmProspect, FALSE);
    $rowProspect     = $fetchProspect['result'];
    if(!empty($fetchProspect['error']))
    {
        $objStatus->setMessage("<li>Prospect Error: {$fetchProspect['error']}</li>");
        $objStatus->setClass("status_error");
    }
    // Whose Prospect? 
    $objProspect->setId_user(htmlentities($rowProspect['id_user'], ENT_QUOTES, 'UTF-8'));
    // Prospect
    $objProspect->setName(htmlentities($rowProspect['name'], ENT_QUOTES, 'UTF-8'));
    $objProspect->setBranch(htmlentities($rowProspect['branch'], ENT_QUOTES, 'UTF-8'));
    $objProspect->setIndustry(htmlentities($rowProspect['industry'], ENT_QUOTES, 'UTF-8'));
    $objProspect->setRecruiter(htmlentities($rowProspect['recruiter'], ENT_QUOTES, 'UTF-8'));
    $objProspect->setDescription(htmlentities($rowProspect['description'], ENT_QUOTES, 'UTF-8'));
    $objProspect->setRemarks(htmlentities($rowProspect['remarks'], ENT_QUOTES, 'UTF-8'));
    // Address
    $objProspect->setAddress_building(htmlentities($rowProspect['address_building'], ENT_QUOTES, 'UTF-8'));
    $objProspect->setAddress_street(htmlentities($rowProspect['address_street'], ENT_QUOTES, 'UTF-8'));
    $objProspect->setAddress_unit(htmlentities($rowProspect['address_unit'], ENT_QUOTES, 'UTF-8'));
    $objProspect->setAddress_city(htmlentities($rowProspect['address_city'], ENT_QUOTES, 'UTF-8'));
    $objProspect->setAddress_state(htmlentities($rowProspect['address_state'], ENT_QUOTES, 'UTF-8'));
    $objProspect->setAddress_zip5(htmlentities($rowProspect['address_zip5'], ENT_QUOTES, 'UTF-8'));
    $objProspect->setAddress_zip4(htmlentities($rowProspect['address_zip4'], ENT_QUOTES, 'UTF-8'));
    // Communication
    $objProspect->setPhone(htmlentities($rowProspect['phone'], ENT_QUOTES, 'UTF-8'));
    $objProspect->setPhone_extension(htmlentities($rowProspect['phone_extension'], ENT_QUOTES, 'UTF-8'));
    $objProspect->setFax(htmlentities($rowProspect['fax'], ENT_QUOTES, 'UTF-8'));
    $objProspect->setEmail(htmlentities($rowProspect['email'], ENT_QUOTES, 'UTF-8'));
    // Links
    $objProspect->setWebsite(htmlentities($rowProspect['website'], ENT_QUOTES, 'UTF-8'));
    $objProspect->setLinkedin(htmlentities($rowProspect['linkedin'], ENT_QUOTES, 'UTF-8'));
    $objProspect->setTwitter(htmlentities($rowProspect['twitter'], ENT_QUOTES, 'UTF-8'));
    $objProspect->setFacebook(htmlentities($rowProspect['facebook'], ENT_QUOTES, 'UTF-8'));
    $objProspect->setGoogleplus(htmlentities($rowProspect['googleplus'], ENT_QUOTES, 'UTF-8'));