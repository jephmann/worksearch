<?php
    /* 2013.09.06 TODO(s):
     * - Consider whether or not to run checks on Prospect and Contact before
     *  deleting, athough it should be okay to delete a Log while leaving
     *  both Contact and Prospect intact
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
    require_once ($page['path'].'_classes/all.php');
    require_once ($page['path'].'_include/helpers.php');
    // =========================================================================
    
    $objDelete  = new Log;
    $objDelete->setId($_GET['id']);
    $id_found   = $objData->id_exists($db, $objDelete);
    $delete     = $objData->db_delete($db, $objDelete, $id_found);
    if(!empty($delete['error']))
    {
        echo $delete['error'];
    }
    else
    {
        header('Location:index.php');
    }