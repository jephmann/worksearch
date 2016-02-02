<?php    
    $page = array(
        'title'     => "Prospects",
        'subtitle'  => " > Create",
        'path'      => "../",
        'mode'      => "Create",
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    // =========================================================================
    
    $objProspect    = new Prospect;
    $objProspect->setId_user($_SESSION['user']['id']);
    $objStates      = new State;
    require ('_defaults.php');
    if (!empty($_POST))
    {
        require_once ('_post.php');
        require ('_defaults.php');
        require_once ('_validation.php');
        if(empty($objStatus->message))
        {            
            $insert = $objData->db_create($db, $objProspect);
            if(!empty($insert['error']))
            {
                $objStatus->setMessage("<li>Failed to Create Prospect: {$insert['error']}<br/>{$objProspect->insert()}</li>");
                $objStatus->setClass("status_error");
            }
            else
            {
                if($objProspect->getContact()==TRUE)
                {
                    $location   = ("../contacts/create.php?prospect={$insert['id']}");
                }
                else
                {
                    $location   = ("detail.php?id={$insert['id']}");
                }
                header('Location:'.$location);
            }
        }
    }    

    // =========================================================================   
    require_once ($page['path'].'_views2/head.php');
    require_once ($page['path'].'_views2/header.php');
    require_once ($page['path'].'_views2/nav.php');
    // require_once ($page['path'].'_views/aside.php');
    require_once ('_form2.php');
    require_once ($page['path'].'_views2/foot.php');