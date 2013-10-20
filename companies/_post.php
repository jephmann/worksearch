<?php    
    $company_recruiter      = NULL;
    if(isset($_POST['company_recruiter']))
    {
        $company_recruiter  = $_POST['company_recruiter'];
    }
    
    $add_contact            = NULL;
    if(isset($_POST['contact']))
    {
        $add_contact        = $_POST['contact'];
    }
    
    /*
     * NEVER set/reset $object->id_user via POST
     */    
    // Company
    $objCompany->setName(ucwords(trim($_POST['company_name'])));
    $objCompany->setIndustry(trim($_POST['company_industry']));
    $objCompany->setRecruiter($company_recruiter);
    $objCompany->setDescription(trim($_POST['company_description']));
    // Address
    $objCompany->setAddress_building(ucwords(strtolower(trim($_POST['address_building']))));
    $objCompany->setAddress_street(ucwords(strtolower(trim($_POST['address_street']))));
    $objCompany->setAddress_unit(ucwords(trim($_POST['address_unit'])));
    $objCompany->setAddress_city(ucwords(strtolower(trim($_POST['address_city']))));
    $objCompany->setAddress_state($_POST['address_state']);
    $objCompany->setAddress_zip5($_POST['address_zip5']);
    $objCompany->setAddress_zip4($_POST['address_zip4']);
    // Communication
    $objCompany->setPhone($_POST['phone']);
    $objCompany->setPhone_extension($_POST['phone_extension']);
    $objCompany->setFax($_POST['fax']);
    $objCompany->setEmail(strtolower(trim($_POST['email'])));
    // Links
    $objCompany->setWebsite(strtolower(trim($_POST['website'])));
    $objCompany->setLinkedin(strtolower(trim($_POST['linkedin'])));
    $objCompany->setTwitter(strtolower(trim($_POST['twitter'])));
    $objCompany->setFacebook(strtolower(trim($_POST['facebook'])));
    $objCompany->setGoogleplus(strtolower(trim($_POST['googleplus'])));
    // Add a new Contact to This Company Now?
    $objCompany->setContact($add_contact);