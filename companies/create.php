<?php    
    $page = array(
        'title'     => "Companies",
        'subtitle'  => " > Create",
        'path'      => "../",
        'mode'      => "Create",
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    require_once ($page['path'].'_classes/all.php');
    require_once ($page['path'].'_functions/all.php');
    $objStatus = new Status;
    $objStatus->setClass("status_quo");
    // =========================================================================
    
    $objCompany = new Company;
    $objCompany->setId_user($_SESSION['user']['id']);    
    require ('_defaults.php');
    if (!empty($_POST))
    {
        require_once ('_post.php');
        require ('_defaults.php');
        require_once ('_validation.php');
        if(empty($objStatus->message))
        {            
            $insert = insertRow($db, $objCompany);
            if(!empty($insert['error']))
            {
                $objStatus->setMessage("<li>Failed to Create Company: {$insert['error']}<br/>{$objCompany->insert()}</li>");
                $objStatus->setClass("status_error");
            }
            else
            {
                if($objCompany->getContact()==TRUE)
                {
                    $location   = ("../contacts/create.php?company={$insert['id']}");
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