<?php    
    $page = array(
        'title'     => "Contacts",
        'subtitle'  => " | Update",
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
    
    $objContact = new Contact;
    $id         = $_GET['id'];
    require ('_fetch.php');
    
    require ('_defaults.php');
    if(!empty($_POST))
    {        
        require_once ('_post.php');
        require ('_defaults.php');
        require_once ('_validation.php');
        if(empty($objStatus->message))
        {
            $update = updateRow($db, $objContact, $id, 'index.php');
            if(!empty($update))
            {
                $objStatus->setMessage("<li>Failed to Update Contact: {$update}</li>");
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