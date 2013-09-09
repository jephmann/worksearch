<?php
    /* 2013.09.06 TODO(s):
     * - Block deletion if Log exists for Company
     * - Consider deleting Company's Contact(s) simultaneously
     * - JavaScript "Are you sure?" logic
     */
    $page = array(
        'title'     => NULL,
        'subtitle'  => NULL,
        'path'      => "../",
        'mode'      => NULL,
    );
    require_once ($page['path'].'_include/first.php');
    require_once ($page['path'].'_classes/all.php');
    require_once ($page['path'].'_functions/all.php');
    // =========================================================================
    
    $objDelete  = new Company;
    $id         = $_GET[$field];
    $id_found   = returnAlreadyCheck($field, $id, $objDelete->table, $db);
    delete($db, $id_found, $id, 'id', $objDelete->delete(), 'Location:index.php');