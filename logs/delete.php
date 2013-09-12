<?php
    /* 2013.09.06 TODO(s):
     * - Consider whether or not to run checks on Company and Contact before
     *  deleting, athough it should be okay to delete a Log while leaving
     *  both Contact and Company intact
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
    
    $objDelete  = new Log;
    $id         = $_GET[$field];
    $id_found   = returnAlreadyCheck($field, $id, $objDelete->table, $db);
    delete($db, $id_found, $id, 'id', $objDelete->delete(), 'Location:index.php');