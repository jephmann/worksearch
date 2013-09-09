<?php
    function updateRow($db, $objTable, $id, $location)
    {
        $error  = NULL;
        try
        {
            $stmt   = $db->prepare($objTable->update());
            $stmt->execute($objTable->parameters($id));
            $error  = NULL;
            header('Location:'.$location);
        }
        catch(PDOException $ex)
        {
            $error  = $ex->getMessage();
        }
        return $error;
    }