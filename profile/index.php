<?php    
    $page = array(
        'title'     => "Profile",
        'subtitle'  => " > Home",
        'path'      => "../",
        'mode'      => NULL,
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    $id_user    = $_SESSION['user']['id'];
    require_once ($page['path'].'_classes/all.php');
    require_once ($page['path'].'_include/helpers.php');
    // =========================================================================
    
    if(empty($_SESSION['profile']['id']))
    {
        header('Location:create.php');
    }
    
    $objProfile = new Profile;
    $objProfile->setId($_SESSION['profile']['id']);
    $objProfile->setId_user($id_user);
    require ('_fetch.php');
    require ('_display.php');    
    
    // =========================================================================
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
    require_once ('_table.php');
    require_once ($page['path'].'_views/footer.php');