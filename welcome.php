<?php    
    $page = array(
        'title'     => "Session",
        'subtitle'  => " > Welcome",
        'path'      => NULL,
        'mode'      => "Welcome",
    );
    require ($page['path'].'_include/first.php');
    user_session($page['path']);
    // =========================================================================
    

    
    /*
     * =========================================================================
     */
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
    require ('_welcome.php');
    require_once ($page['path'].'_views/footer.php');