<?php
    /* 2013.08.28 TODO(s):
     * - Redapt to $objLog->delete($id)
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
    require_once ($page['path'].'_classes/Data.php');
    require_once ($page['path'].'_classes/Log.php');
    require_once ($page['path'].'_functions/returnAlreadyCheck.php');
    
    $field      = 'id';
    $id         = $_GET[$field];
    $id_found   = returnAlreadyCheck($field, $id, 'logs', $db);
    
    $objLog = new Log;    
    
    if($id_found == TRUE)
    {
        try
        {
            $stmt = $db->prepare($objLog->delete());
            $stmt->bindParam(':'.$field, $id);
            $stmt->execute();
            echo $stmt->rowCount();
        }
        catch(PDOException $e)
        {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    header("Location:index.php");