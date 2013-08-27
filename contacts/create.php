<?php    
    $page = array(
        'title'     => "Contacts",
        'subtitle'  => " | Create",
        'path'      => "../",
        'mode'      => "Create",
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
    
    $objContact = new Contact();
    /*
     * =========================================================================
     */
    
    if(isset($_GET['company']))
    {
        $objContact->setCompany($_GET['company']);
    }
    
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
                $stmt_insert        = $db->prepare($objContact->insert());
                $stmt_insert->execute($objContact->parameters(NULL));
                $new_id['contact']  = $db->lastInsertId();
                $header             = "Location:";
                if(isset($_GET['company']))
                {
                    $header         .= ("../companies/index.php");                
                }
                else
                {
                    $header         .= ("index.php");
                }
                header($header);
            }
            catch(PDOException $ex)
            {
                $objStatus->setMessage("<li>Failed to add the new Contact: {$ex->getMessage()}</li>");
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