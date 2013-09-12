<?php
    /* 2013.09.06 TODO(s):
     * - Block deletion if Log exists for Contact
     * - Consider deleting Contact's Company simultaneously, unless at least one
     *  other Contact shares its Company
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
    require_once ($page['path'].'_functions/all.php');
    // =========================================================================
    
    $objDelete  = new Contact;
    $id         = $_GET[$field];
    $id_found   = returnAlreadyCheck($field, $id, $objDelete->table, $db);
    delete($db, $id_found, $id, 'id', $objDelete->delete(), 'Location:index.php');