<?php    
    $page = array(
        'title'     => "Companies",
        'subtitle'  => " > Create",
        'path'      => "../",
        'mode'      => "Create",
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
    
    require ('_defaults.php');
    if (!empty($_POST))
    {
        require_once ('_post.php');
        require ('_defaults.php');
        require_once ('_validation.php');
        if(empty($objStatus->message))
        {
            try
            {
                $stmt_insert        = $db->prepare($objCompany->insert());
                $stmt_insert->execute($objCompany->parameters(NULL));
                $new_id['company']  = $db->lastInsertId();
                $header             = "Location:";
                if($objCompany->getContact()==TRUE)
                {
                    $header .= "../contacts/create.php?company={$new_id['company']}";
                }
                else
                {
                    $header .= "index.php";
                }
                header($header);
            }
            catch(PDOException $ex)
            {
                $objStatus->setMessage("<li>Failed to add the new Company: {$ex->getMessage()}</li>");
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