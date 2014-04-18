<?php   
    $page = array(
        'title'     => "Profile",
        'subtitle'  => " > Update",
        'path'      => "../",
        'mode'      => "Update",
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    $id_user    = $_SESSION['user']['id'];
    require_once ($page['path'].'_classes/all.php');
    require_once ($page['path'].'_include/helpers.php');
    // =========================================================================
    
    $objProfile         = new Profile;
    $objProfile->setId($_SESSION['profile']['id']);
    $objProfile->setId_user($id_user);
    require ('_fetch.php');
    $objStates          = new State;
    $objSalutations     = new Salutation;
    $objNameSuffixes    = new Name_Suffix;
    require ('_defaults.php');
    if(!empty($_POST))
    {
        require_once ('_post.php');
        require ('_defaults.php');
        require_once ('_validation.php');
        if(empty($objStatus->message))
        {
            $location   = 'index.php';
            $update     = $objData->db_update($db, $objProfile);
            if(!empty($update['result']['error']))
            {
                $objStatus->setMessage("<li>Failed to Update Profile: {$update['result']['error']}</li>");
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