<?php
    /* 2015.10.16 TODO(s):
     * - JavaScript "Are you sure?" logic
     */
    $page = array(
        'title'     => NULL,
        'subtitle'  => NULL,
        'path'      => "../",
        'mode'      => NULL,
    );
    require_once ($page['path'].'_include/first.php');
    user_session($page['path']);
    // =========================================================================
    
    $objDelete  = new Profile;
    $objDelete->setId($_SESSION['profile']['id']);
    $id_found   = $objData->id_exists($db, $objDelete);
    $delete     = $objData->db_delete($db, $objDelete, $id_found);
    if(!empty($delete['error']))
    {
        echo $delete['error'];
    }
    else
    {
        unset($_SESSION['profile']);
        header('Location:index.php');
    }