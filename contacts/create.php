<?php    
    $page = array(
        'title'     => "Contacts",
        'subtitle'  => " | Create",
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
    
    $objContact = new Contact();
    $objContact->setId_user($_SESSION['user']['id']);    
    if(isset($_GET['company']))
    {
        $objContact->setId_company($_GET['company']);
    }
    require ('_defaults.php');
    if (!empty($_POST))
    {        
        require_once ('_post.php');
        require ('_defaults.php');
        require_once ('_validation.php');
        if(empty($objStatus->message))
        {            
            $insert = insertRow($db, $objContact);
            if(!empty($insert['error']))
            {
                $objStatus->setMessage("<li>Failed to Create Contact: {$insert['error']}</li>");
                $objStatus->setColor("FF0000");
                $objStatus->setBackground_color("FFFF00");
            }
            else
            {
                if(isset($_GET['company']))
                {
                    $location   = ("../companies/index.php");                
                }
                else
                {
                    $location   = ("index.php");
                }
                header('Location:'.$location);
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