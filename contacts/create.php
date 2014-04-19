<?php    
    $page = array(
        'title'     => "Contacts",
        'subtitle'  => " | Create",
        'path'      => "../",
        'mode'      => "Create",
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    // =========================================================================
    
    $objContact         = new Contact;
    $objContact->setId_user($_SESSION['user']['id']);    
    if(isset($_GET['prospect']))
    {
        $objContact->setId_prospect($_GET['prospect']);
    }
    $objSalutations     = new Salutation;
    $objNameSuffixes    = new Name_Suffix;
    $objProspects       = new Prospect;
    require ('_defaults.php');
    if (!empty($_POST))
    {        
        require_once ('_post.php');
        require ('_defaults.php');
        require_once ('_validation.php');
        if(empty($objStatus->message))
        {            
            $insert = $objData->db_create($db, $objContact);
            if(!empty($insert['error']))
            {
                $objStatus->setMessage("<li>Failed to Create Contact: {$insert['error']}<br/>{$objContact->insert()}</li>");
                $objStatus->setClass("status_error");
            }
            else
            {
                if(isset($_GET['prospect']))
                {
                    $location   = ("../prospects/index.php");                
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
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
    require_once ('_form.php');
    require_once ($page['path'].'_views/footer.php');