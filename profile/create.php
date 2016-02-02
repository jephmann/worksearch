<?php   
    $page = array(
        'title'     => "Profile",
        'subtitle'  => " > Create",
        'path'      => "../",
        'mode'      => "Create",
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    // =========================================================================
    
    $thisYear   = date('Y');
    $thisMonth  = date('m');
    $thisDay    = date('d');
    
    $thisDate   = "{$thisYear}-{$thisMonth}-{$thisDay}";
    $dateBirth  = date("Y-m-d",strtotime($thisDate));
    
    $objProfile         = new Profile;
    $objProfile->setId_user($_SESSION['user']['id']);
    $objProfile->setDate_birth($dateBirth);
    $objStates          = new State;
    $objSalutations     = new Salutation;
    $objNameSuffixes    = new Name_Suffix;
    require ('_defaults.php');
    if (!empty($_POST))
    {
        require_once ('_post.php');
        require ('_defaults.php');
        require_once ('_validation.php');
        if(empty($objStatus->message))
        {
            $insert = $objData->db_create($db, $objProfile);
            if(!empty($insert['error']))
            {
                $objStatus->setMessage("<li>Failed to Create Profile: {$insert['error']}<br/>{$objProfile->insert()}</li>");
                $objStatus->setClass("status_error");
            }
            else
            {
                // repopulate session with new profile data
                unset($_SESSION['profile']);
                $objCreate     = new Profile;
                $prmCreate     = $objCreate->id_params(NULL, $_SESSION['user']['id']);
                $sqlCreate     = $objCreate->selectAll($_SESSION['user']['id']) . " LIMIT 1";
                $fetchCreate   = $objData->db_read($db, $sqlCreate, $prmCreate, TRUE);
                $rowCreate     = $fetchCreate['result'][0];
                if(!empty($rowCreate))
                {
                    $_SESSION['profile'] = $rowCreate;
                }
                // redirect
                header('Location:index.php');
            }
        }
    }

    // =========================================================================
    require_once ($page['path'].'_views2/head.php');
    require_once ($page['path'].'_views2/header.php');
    require_once ($page['path'].'_views2/nav.php');
    require_once ('_form2.php');
    require_once ($page['path'].'_views2/foot.php');