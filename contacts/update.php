<?php    
    $page = array(
        'title'     => "Contacts",
        'subtitle'  => " | Update",
        'path'      => "../",
        'mode'      => "Update",
    );
    require_once ($page['path'].'_include/first.php');
    require_once ($page['path'].'_classes/Status.php');
    require_once ($page['path'].'_classes/Data.php');
    require_once ($page['path'].'_classes/Person.php');
    require_once ($page['path'].'_classes/Contact.php');
    require_once ($page['path'].'_functions/redirect.php');
    require_once ($page['path'].'_functions/ddlOptions.php');
    require_once ($page['path'].'_functions/rblTrueFalse.php');
    require_once ($page['path'].'_functions/rblGender.php');
    require_once ($page['path'].'_functions/returnAlreadyCheck.php');
    
    $objStatus = new Status;
    $objStatus->setColor("003300");
    $objStatus->setBackground_color("CCFFCC");
    
    $objContact = new Contact;
    /*
     * =========================================================================
     */

    $id = $_GET['id'];
    try
    {
        $stmt = $db->prepare($objContact->select($id));
        $stmt->execute();
    }
    catch(PDOException $ex)
    {
        die("Failed to run query: " . $ex->getMessage());
    }
    $row = $stmt->fetch();
    
    // Who
    $objContact->setGender(htmlentities($row['gender'], ENT_QUOTES, 'UTF-8'));
    $objContact->setId_salutation(htmlentities($row['id_salutation'], ENT_QUOTES, 'UTF-8'));
    $objContact->setName_first(htmlentities($row['name_first'], ENT_QUOTES, 'UTF-8'));
    $objContact->setName_middle(htmlentities($row['name_middle'], ENT_QUOTES, 'UTF-8'));
    $objContact->setName_last(htmlentities($row['name_last'], ENT_QUOTES, 'UTF-8'));
    $objContact->setName_suffix(htmlentities($row['name_suffix'], ENT_QUOTES, 'UTF-8'));
    // Company
    $objContact->setID_company(htmlentities($row['id_company'], ENT_QUOTES, 'UTF-8'));
    $objContact->setDepartment(htmlentities($row['department'], ENT_QUOTES, 'UTF-8'));
    $objContact->setTitle(htmlentities($row['title'], ENT_QUOTES, 'UTF-8'));
    // Communication
    $objContact->setPhone(htmlentities($row['phone'], ENT_QUOTES, 'UTF-8'));
    $objContact->setPhone_extension(htmlentities($row['phone_extension'], ENT_QUOTES, 'UTF-8'));
    $objContact->setFax(htmlentities($row['fax'], ENT_QUOTES, 'UTF-8'));
    $objContact->setEmail(htmlentities($row['email'], ENT_QUOTES, 'UTF-8'));
    // Links
    $objContact->setLinkedin(htmlentities($row['linkedin'], ENT_QUOTES, 'UTF-8')); 
    $objContact->setTwitter(htmlentities($row['twitter'], ENT_QUOTES, 'UTF-8'));  
    $objContact->setFacebook(htmlentities($row['facebook'], ENT_QUOTES, 'UTF-8'));  
    $objContact->setGoogleplus(htmlentities($row['googleplus'], ENT_QUOTES, 'UTF-8'));
    
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
                $stmt_update    = $db->prepare($objContact->update());
                $stmt_update->execute($objContact->parameters($id));
                header('Location:index.php');
            }
            catch(PDOException $ex)
            {
                $objStatus->setMessage("<li>Failed to Update Contact: {$ex->getMessage()}</li>");
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