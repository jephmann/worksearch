<?php    
    $page = array(
        'title'     => "Companies",
        'subtitle'  => " > Update",
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
    
    $objCompany = new Company;
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
            if($objCompany->contact==TRUE)
            {
                $location   = "../contacts/create.php?company={$id}";
            }
            else
            {
                $location   = "index.php";
            }
            $update = updateRow($db, $objCompany, $id, $location);
            if(!empty($update))
            {
                $objStatus->setMessage("<li>Failed to Update Company: {$update}</li>");
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