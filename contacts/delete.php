<?php
    /* 2013.08.28 TODO(s):
     * - Redapt to $objContact->delete($id)
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
    require_once ($page['path'].'_classes/Data.php');
    require_once ($page['path'].'_classes/Person.php');
    require_once ($page['path'].'_classes/Contact.php');
    require_once ($page['path'].'_functions/returnAlreadyCheck.php');
    
    $field      = 'id';
    $id         = $_GET[$field];
    $id_found   = returnAlreadyCheck($field, $id, 'contacts', $db);
    
    $objContact = new Contact;    
    
    if($id_found == TRUE)
    {
        try
        {
            $stmt = $db->prepare($objContact->delete());
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