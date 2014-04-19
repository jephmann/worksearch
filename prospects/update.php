<?php    
    $page = array(
        'title'     => "Prospects",
        'subtitle'  => " > Update",
        'path'      => "../",
        'mode'      => "Update",
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    // =========================================================================
    
    $id_user    = $_SESSION['user']['id'];
    $objProspect    = new Prospect;
    $objProspect->setId($_GET['id']);
    $objProspect->setId_user($id_user);
    require ('_fetch.php');
    $objStates      = new State;
    require ('_defaults.php');
    if(!empty($_POST))
    {
        require_once ('_post.php');
        require ('_defaults.php');
        require_once ('_validation.php');
        if(empty($objStatus->message))
        {
            $location   = NULL;
            if($objProspect->contact==TRUE)
            {
                $location   = "../contacts/create.php?prospect={$objProspect->id}";
            }
            else
            {
                $location   = "detail.php?id={$objProspect->id}";
            }
            $update     = $objData->db_update($db, $objProspect);
            if(!empty($update['result']['error']))
            {
                $objStatus->setMessage("<li>Failed to Update Prospect: {$update['result']['error']}</li>");
                $objStatus->setClass("status_error");
            }
            else
            {
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