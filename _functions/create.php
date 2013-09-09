<?php
    function insertRow($db, $objTable)
    {
        $error  = NULL;
        $id     = NULL;
        try
        {
            $stmt   = $db->prepare($objTable->insert());
            $stmt->execute($objTable->parameters(NULL));
            $id     = $db->lastInsertId();
            $error  = NULL;
        }
        catch(PDOException $ex)
        {
            $id     = NULL;
            $error  = $ex->getMessage();
        }
        $result = array(
            'id'    => $id,
            'error' => $error,
            );
        return $result;
    }