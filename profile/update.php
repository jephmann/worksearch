<?php   
    $page = array(
        'title'     => "Profile",
        'subtitle'  => " > Update",
        'path'      => "../",
        'mode'      => "Update",
    );
    require_once ($page['path'].'_include/first.php');
    require_once ($page['path'].'_classes/Status.php');
    require_once ($page['path'].'_classes/Data.php');
    require_once ($page['path'].'_classes/Person.php');
    require_once ($page['path'].'_classes/Profile.php');
    require_once ($page['path'].'_functions/redirect.php');
    require_once ($page['path'].'_functions/ddlOptions.php');
    require_once ($page['path'].'_functions/rblTrueFalse.php');
    require_once ($page['path'].'_functions/rblGender.php');
    require_once ($page['path'].'_functions/returnAlreadyCheck.php');
    
    $objStatus = new Status;
    $objStatus->setColor("003300");
    $objStatus->setBackground_color("CCFFCC");
    
    $objProfile = new Profile;
    /*
     * =========================================================================
     */

    //$id = $_GET['id'];
    $id = 1;
    try
    {
        $stmt = $db->prepare($objProfile->select($id));
        $stmt->execute();
    }
    catch(PDOException $ex)
    {
        die("Failed to run query: " . $ex->getMessage());
    }
    $row = $stmt->fetch();
    
    // Login -- CHECK TUTORIAL re encryption and other jazz
    $objProfile->setUsername(htmlentities($row['username'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setPassword(htmlentities($row['password'], ENT_QUOTES, 'UTF-8'));
    // Who Are You
    $objProfile->setGender(htmlentities($row['gender'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setId_salutation(htmlentities($row['id_salutation'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setName_first(htmlentities($row['name_first'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setName_middle(htmlentities($row['name_middle'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setName_last(htmlentities($row['name_last'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setName_suffix(htmlentities($row['name_suffix'], ENT_QUOTES, 'UTF-8'));
    // Address
    $objProfile->setAddress_street(htmlentities($row['address_street'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setAddress_unit(htmlentities($row['address_unit'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setAddress_city(htmlentities($row['address_city'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setAddress_state(htmlentities($row['address_state'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setAddress_zip5(htmlentities($row['address_zip5'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setAddress_zip4(htmlentities($row['address_zip4'], ENT_QUOTES, 'UTF-8'));
    // Communication
    $objProfile->setPhone(htmlentities($row['phone'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setFax(htmlentities($row['fax'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setEmail(htmlentities($row['email'], ENT_QUOTES, 'UTF-8'));
    // Identification
    $objProfile->setSocial_security_number(htmlentities($row['social_security_number'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setDrivers_state(htmlentities($row['drivers_state'], ENT_QUOTES, 'UTF-8'));
    $objProfile->setDrivers_license(htmlentities($row['drivers_license'], ENT_QUOTES, 'UTF-8'));
    
    require ('_defaults.php');
    if(!empty($_POST))
    {
        require_once ('_post.php');
        require ('_defaults.php');
        require_once ('_validation.php');
        if(empty($objStatus->message))
        {
            try
            {
                $stmt_update = $db->prepare($objProfile->update());
                $stmt_update->execute($objProfile->parameters($id));
                $header = "Location:";
                $header .= "../welcome.php";
                header($header);
            }
            catch(PDOException $ex)
            {
                $errMessage = "<li>Failed to Update Profile: {$ex->getMessage()}</li>";
                $errMessage .= "<li>{$objProfile->update()}</li>";
                $objStatus->setMessage($errMessage);
                $objStatus->setColor("FF0000");
                $objStatus->setBackground_color("FFFF00");
            }
        }
        
    }
    
    /*
     * =========================================================================
     */
    require_once ($page['path'].'_html/head.php');
    require_once ($page['path'].'_html/header.php');
    require_once ($page['path'].'_html/aside.php');
    require_once ('_form.php');
    require_once ($page['path'].'_html/footer.php');
?>