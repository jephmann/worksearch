<?php    
    $page = array(
        'title'     => "Companies",
        'subtitle'  => " > Update",
        'path'      => "../",
        'mode'      => "Update",
    );
    require_once ($page['path'].'_include/first.php');
    require_once ($page['path'].'_classes/Status.php');
    require_once ($page['path'].'_classes/Data.php');
    require_once ($page['path'].'_classes/Company.php');
    require_once ($page['path'].'_functions/redirect.php');
    require_once ($page['path'].'_functions/ddlOptions.php');
    require_once ($page['path'].'_functions/rblTrueFalse.php');
    require_once ($page['path'].'_functions/returnAlreadyCheck.php');
    
    $objStatus = new Status;
    $objStatus->setColor("003300");
    $objStatus->setBackground_color("CCFFCC");
    
    $objCompany = new Company;
    /*
     * =========================================================================
     */

    $id = $_GET['id'];
    try
    {
        $stmt = $db->prepare($objCompany->select($id));
        $stmt->execute();
    }
    catch(PDOException $ex)
    {
        die("Failed to run query: " . $ex->getMessage());
    }
    $row = $stmt->fetch();
    
    // Company
    $objCompany->setName(htmlentities($row['name'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setIndustry(htmlentities($row['industry'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setRecruiter(htmlentities($row['recruiter'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setDescription(htmlentities($row['description'], ENT_QUOTES, 'UTF-8'));
    // Address
    $objCompany->setAddress_building(htmlentities($row['address_building'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setAddress_street(htmlentities($row['address_street'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setAddress_unit(htmlentities($row['address_unit'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setAddress_city(htmlentities($row['address_city'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setAddress_state(htmlentities($row['address_state'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setAddress_zip5(htmlentities($row['address_zip5'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setAddress_zip4(htmlentities($row['address_zip4'], ENT_QUOTES, 'UTF-8'));
    // Communication
    $objCompany->setPhone(htmlentities($row['phone'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setPhone_extension(htmlentities($row['phone_extension'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setFax(htmlentities($row['fax'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setEmail(htmlentities($row['email'], ENT_QUOTES, 'UTF-8'));
    // Links
    $objCompany->setWebsite(htmlentities($row['website'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setLinkedin(htmlentities($row['linkedin'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setTwitter(htmlentities($row['twitter'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setFacebook(htmlentities($row['facebook'], ENT_QUOTES, 'UTF-8'));
    $objCompany->setGoogleplus(htmlentities($row['googleplus'], ENT_QUOTES, 'UTF-8'));
    
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
                $stmt_update = $db->prepare($objCompany->update());
                $stmt_update->execute($objCompany->parameters($id));
                $header = "Location:";
                if($objCompany->contact==TRUE)
                {
                    $header .= "../contacts/create.php?company={$id}";
                }
                else
                {
                    $header .= "index.php";
                }
                header($header);
            }
            catch(PDOException $ex)
            {
                $objStatus->setMessage("<li>Failed to Update Company: {$ex->getMessage()}</li>");
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