<?php
    function fetchRow($db, $objTable, $id)
    {
        $row = NULL;
        try
        {
            $stmt = $db->prepare($objTable->select($id));
            $stmt->execute();
        }
        catch(PDOException $ex)
        {
            die("Failed to run query: " . $ex->getMessage());
        }
        $row = $stmt->fetch();
        return $row;        
    }
    
    function fetchRowsWhere($db, $field, $id, $sql_fetch_all)
    {
        $rows = NULL;
        try
        {
            $stmt = $db->prepare($sql_fetch_all);
            $stmt->bindParam(':'.$field, $id);
            $stmt->execute();
        }
        catch(PDOException $ex)
        {
            die("Failed to run query: " . $ex->getMessage());
        }
        $rows = $stmt->fetchAll();
        return $rows;
    }