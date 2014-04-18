<?php    
    $page = array(
        'title'     => "Contacts",
        'subtitle'  => " | Update",
        'path'      => "../",
        'mode'      => "Update",
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    $id_user    = $_SESSION['user']['id'];
    require_once ($page['path'].'_classes/all.php');
    require_once ($page['path'].'_include/helpers.php');
    // =========================================================================
    
    $objContact =       new Contact;
    $objContact->setId($_GET['id']);
    $objContact->setId_user($id_user);
    require ('_fetch.php');
    $objSalutations     = new Salutation;
    $objNameSuffixes    = new Name_Suffix;
    $objProspects       = new Prospect;
    require ('_defaults.php');
    if(!empty($_POST))
    {        
        require_once ('_post.php');
        require ('_defaults.php');
        require_once ('_validation.php');
        if(empty($objStatus->message))
        {
            $location   = "detail.php?id={$objContact->id}";
            $update     = $objData->db_update($db, $objContact);
            if(!empty($update['result']['error']))
            {
                $objStatus->setMessage("<li>Failed to Update Contact: {$update['result']['error']}</li>");
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