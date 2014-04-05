<?php
    $prmCompany     = $objCompany->id_params($objCompany->id, $objCompany->id_user);
    $sqlCompany     = $objCompany->select($objCompany->id_user);
    $fetchCompany   = read($db, $sqlCompany, $prmCompany, FALSE);
    $rowCompany     = $fetchCompany['result'];
    if(!empty($fetchCompany['error']))
    {
        $objStatus->setMessage("<li>Company Error: {$fetchCompany['error']}</li>");
        $objStatus->setClass("status_error");
    }
    // Whose Company? 
    $objCompany->setId_user(htmlentities($rowCompany['id_user'], ENT_QUOTES, 'UTF-8'));
    // Company
    $objCompany->setName(htmlentities($rowCompany['name'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setIndustry(htmlentities($rowCompany['industry'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setRecruiter(htmlentities($rowCompany['recruiter'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setDescription(htmlentities($rowCompany['description'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setRemarks(htmlentities($rowCompany['remarks'], ENT_QUOTES, 'UTF-8'));
    // Address
    $objCompany->setAddress_building(htmlentities($rowCompany['address_building'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setAddress_street(htmlentities($rowCompany['address_street'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setAddress_unit(htmlentities($rowCompany['address_unit'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setAddress_city(htmlentities($rowCompany['address_city'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setAddress_state(htmlentities($rowCompany['address_state'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setAddress_zip5(htmlentities($rowCompany['address_zip5'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setAddress_zip4(htmlentities($rowCompany['address_zip4'], ENT_QUOTES, 'UTF-8'));
    // Communication
    $objCompany->setPhone(htmlentities($rowCompany['phone'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setPhone_extension(htmlentities($rowCompany['phone_extension'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setFax(htmlentities($rowCompany['fax'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setEmail(htmlentities($rowCompany['email'], ENT_QUOTES, 'UTF-8'));
    // Links
    $objCompany->setWebsite(htmlentities($rowCompany['website'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setLinkedin(htmlentities($rowCompany['linkedin'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setTwitter(htmlentities($rowCompany['twitter'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setFacebook(htmlentities($rowCompany['facebook'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setGoogleplus(htmlentities($rowCompany['googleplus'], ENT_QUOTES, 'UTF-8'));