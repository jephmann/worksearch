<?php    
    function read($db,$sql,$parameters,$all)
    {
        $error      = NULL;
        $result     = NULL;
        try
        {
            $stmt   = $db->prepare($sql);
            $stmt->execute($parameters);
        }
        catch(PDOException $ex)
        {
            $error  = ("Failed to run query: " . $ex->getMessage());
        }
        if($all == TRUE)
        {
            $result = $stmt->fetchAll();
        }
        else
        {
            $result = $stmt->fetch();
        }
        
        $read  = array(
            'result'    => $result,
            'error'     => $error,
        );
        return $read;
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