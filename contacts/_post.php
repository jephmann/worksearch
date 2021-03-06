<?php    
    $contact_gender     = NULL;
    if(isset($_POST['gender']))
    {
        $contact_gender = $_POST['gender'];
    }
    
    /*
     * NEVER set/reset $object->id_user via POST
     */
    
    // Who (Contact)
    $objContact->setGender($contact_gender);
    $objContact->setId_salutation($_POST['salutation']);
    $objContact->setName_first(ucwords(trim($_POST['name_first'])));
    $objContact->setName_middle(ucwords(trim($_POST['name_middle'])));
    $objContact->setName_last(ucwords(trim($_POST['name_last'])));
    $objContact->setId_name_suffix($_POST['name_suffix']);
    $objContact->setRemarks($_POST['remarks']);
    
    // Prospect
    $objContact->setId_prospect($_POST['prospect']);
    $objContact->setDepartment(trim($_POST['department']));
    $objContact->setTitle(trim($_POST['title']));
    
    // Communication
    $objContact->setPhone($_POST['phone']);
    $objContact->setPhone_extension($_POST['phone_extension']);
    $objContact->setPhone_mobile($_POST['phone_mobile']);
    $objContact->setFax($_POST['fax']);
    $objContact->setEmail(strtolower(trim($_POST['contact_email'])));
    $objContact->setSkype($_POST['skype']);
    
    // Links
    $objContact->setWebsite(strtolower(trim($_POST['website'])));
    $objContact->setLinkedin(strtolower(trim($_POST['linkedin'])));
    $objContact->setTwitter(strtolower(trim($_POST['twitter'])));
    $objContact->setFacebook(strtolower(trim($_POST['facebook'])));
    $objContact->setGoogleplus(strtolower(trim($_POST['googleplus'])));