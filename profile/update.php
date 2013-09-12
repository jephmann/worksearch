<?php   
    $page = array(
        'title'     => "Profile",
        'subtitle'  => " > Update",
        'path'      => "../",
        'mode'      => "Update",
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

    //$id = $_GET['id'];
    $id = 1;
    require ('_fetch.php');
    
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

    // =========================================================================
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
    require_once ('_form.php');
    require_once ($page['path'].'_views/footer.php');
?>