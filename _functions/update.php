<?php    
    function updateRow($db, $objTable)
    {
        $error  = NULL;
        try
        {
            $stmt   = $db->prepare($objTable->update());
            $stmt->execute($objTable->parameters($objTable->id));
            $error  = NULL;            
        }
        catch(PDOException $ex)
        {
            $error  = $ex->getMessage();
        }
        $result = array(
            'error' => $error,
        );
        return $result;
    }