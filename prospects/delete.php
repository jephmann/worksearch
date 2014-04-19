<?php
    /* 2013.09.06 TODO(s):
     * - Block deletion if Log exists for Prospect
     * - Consider deleting Prospect's Contact(s) simultaneously
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
    
    $objDelete  = new Prospect;
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