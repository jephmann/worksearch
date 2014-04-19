<?php    
    $page = array(
        'title'     => "Logs",
        'subtitle'  => " | Update",
        'path'      => "../",
        'mode'      => "Update",
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    // =========================================================================
    
    $id_user            = $_SESSION['user']['id'];
    $objLog             = new Log;
    $objLog->setId($_GET['id']);
    $objLog->setId_user($id_user);
    require ('_fetch.php');
    $objProspects       = new Prospect;
    $objContacts        = new Contact;
    $objContactMethods  = new Contact_Method;
    require ('_defaults.php');
    if(!empty($_POST))
    {
        require_once ('_post.php');
        require ('_defaults.php');
        require_once ('_validation.php');
        if(empty($objStatus->message))
        {
            $location   = "detail.php?id={$objLog->id}";
            $update     = $objData->db_update($db, $objLog);
            if(!empty($update['result']['error']))
            {
                $objStatus->setMessage("<li>Failed to Update Log: {$update['result']['error']}</li>");
                $objStatus->setClass("status_error");
            }
            else
            {
                header("Location:{$location}");
            }
        }
    }
    
    // =========================================================================
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
    require_once ('_form.php');
    require_once ($page['path'].'_views/footer.php');