<?php   
    $page = array(
        'title'     => "Profile",
        'subtitle'  => " > Create",
        'path'      => "../",
        'mode'      => "Create",
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    require_once ($page['path'].'_classes/all.php');
    require_once ($page['path'].'_functions/all.php');
    $objStatus = new Status;
    $objStatus->setColor("003300");
    $objStatus->setBackground_color("CCFFCC");
    // =========================================================================
    
    $objProfile = new Profile;
    $objProfile->setId_user($_SESSION['user']['id']);
    
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
                $stmt_insert        = $db->prepare($objProfile->insert());
                $stmt_insert->execute($objProfile->parameters(NULL));
                $new_id['profile']  = $db->lastInsertId();
                $header             = "Location:../login.php?new=".$new_id['profile'];
                header($header);
            }
            catch(PDOException $ex)
            {
                $errMessage = "<li>Failed to add the new Profile: {$ex->getMessage()}</li>";
                $errMessage .= "<li>{$objProfile->insert()}</li>";
                $objStatus->setMessage($errMessage);
                $objStatus->setColor("FF0000");
                $objStatus->setBackground_color("FFFF00");
            }
        }
    }

    // =========================================================================
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
    require_once ('_form.php');
    require_once ($page['path'].'_views/footer.php');
?>