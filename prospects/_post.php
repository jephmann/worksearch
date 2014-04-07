<?php    
    $prospect_recruiter      = NULL;
    if(isset($_POST['prospect_recruiter']))
    {
        $prospect_recruiter  = $_POST['prospect_recruiter'];
    }
    
    $add_contact            = NULL;
    if(isset($_POST['contact']))
    {
        $add_contact        = $_POST['contact'];
    }
    
    /*
     * NEVER set/reset $object->id_user via POST
     */    
    // Prospect
    $objProspect->setName(ucwords(trim($_POST['prospect_name'])));
    $objProspect->setBranch(ucwords(trim($_POST['prospect_branch'])));
    $objProspect->setIndustry(ucwords(trim($_POST['prospect_industry'])));
    $objProspect->setRecruiter($prospect_recruiter);
    $objProspect->setDescription(trim($_POST['prospect_description']));
    $objProspect->setRemarks($_POST['remarks']);
    // Address
    $objProspect->setAddress_building(ucwords(trim($_POST['address_building'])));
    $objProspect->setAddress_street(ucwords(trim($_POST['address_street'])));
    $objProspect->setAddress_unit(ucwords(trim($_POST['address_unit'])));
    $objProspect->setAddress_city(ucwords(trim($_POST['address_city'])));
    $objProspect->setAddress_state($_POST['address_state']);
    $objProspect->setAddress_zip5($_POST['address_zip5']);
    $objProspect->setAddress_zip4($_POST['address_zip4']);
    // Communication
    $objProspect->setPhone($_POST['phone']);
    $objProspect->setPhone_extension($_POST['phone_extension']);
    $objProspect->setFax($_POST['fax']);
    $objProspect->setEmail(strtolower(trim($_POST['prospect_email'])));
    // Links
    $objProspect->setWebsite(strtolower(trim($_POST['website'])));
    $objProspect->setLinkedin(strtolower(trim($_POST['linkedin'])));
    $objProspect->setTwitter(strtolower(trim($_POST['twitter'])));
    $objProspect->setFacebook(strtolower(trim($_POST['facebook'])));
    $objProspect->setGoogleplus(strtolower(trim($_POST['googleplus'])));
    // Add a new Contact to This Prospect Now?
    $objProspect->setContact($add_contact);