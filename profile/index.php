<?php    
    $page = array(
        'title'     => "Profile",
        'subtitle'  => " > Home",
        'path'      => "../",
        'mode'      => NULL,
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    // =========================================================================
    
    $id_user    = $_SESSION['user']['id'];
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
    require_once ($page['path'].'_views2/head.php');
    require_once ($page['path'].'_views2/header.php');
    require_once ($page['path'].'_views2/nav.php');
    require_once ('_table2.php');
    require_once ($page['path'].'_views2/foot.php');