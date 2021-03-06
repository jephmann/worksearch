<?php   
    $page = array(
        'title'     => "Profile",
        'subtitle'  => " > Update",
        'path'      => "../",
        'mode'      => "Update",
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    // =========================================================================
    
    $id_user            = $_SESSION['user']['id'];
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
                // repopulate session with new profile data
                unset($_SESSION['profile']);
                $objUpdate     = new Profile;
                $prmUpdate     = $objUpdate->id_params(NULL, $_SESSION['user']['id']);
                $sqlUpdate     = $objUpdate->selectAll($_SESSION['user']['id']) . " LIMIT 1";
                $fetchUpdate   = $objData->db_read($db, $sqlUpdate, $prmUpdate, TRUE);
                $rowUpdate     = $fetchUpdate['result'][0];
                if(!empty($rowUpdate))
                {
                    $_SESSION['profile'] = $rowUpdate;
                }
                // redirect
                header('Location:'.$location);
            }
        }
    }

    // =========================================================================
    require_once ($page['path'].'_views2/head.php');
    require_once ($page['path'].'_views2/header.php');
    require_once ($page['path'].'_views2/nav.php');
    require_once ('_form2.php');
    require_once ($page['path'].'_views2/foot.php');