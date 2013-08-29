<?php
    /* 2013.08.28 TODO(s):
     * - Redapt to $objCompany->delete($id)
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
    require_once ($page['path'].'_classes/Data.php');
    require_once ($page['path'].'_classes/Company.php');
    require_once ($page['path'].'_functions/returnAlreadyCheck.php');
    
    $field      = 'id';
    $id         = $_GET[$field];
    $id_found   = returnAlreadyCheck($field, $id, 'companies', $db);
    
    $objCompany = new Company;    
    
    if($id_found == TRUE)
    {
        try
        {
            $stmt = $db->prepare($objCompany->delete());
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