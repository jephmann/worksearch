<?php
    /* 2013.09.06 TODO(s):
     * - Block deletion if Log exists for Contact
     * - Consider deleting Contact's Prospect simultaneously, unless at least one
     *  other Contact shares its Prospect
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
    
    $objDelete  = new Contact;
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