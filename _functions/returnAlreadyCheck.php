<?php
    function returnAlreadyCheck($field, $value, $db_table, $db)
    {
        $boolean = false;
        $queryAlready = "SELECT 1 FROM {$db_table} WHERE {$field} = :{$field}";
        $paramAlready = array(':'.$field => $value);
        try
        {
            $stmt   = $db->prepare($queryAlready);
            $result = $stmt->execute($paramAlready);
        }
        catch(PDOException $ex)
        {
            die("Failed to run query on {$db_table}.{$field} in : " . $ex->getMessage());
        }
        $row = $stmt->fetch();
        if($row)
        {
            $boolean = true;
        }
        return $boolean;
    }