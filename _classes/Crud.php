<?php
/**
 * Description of Crud
 * Helper class which sends SQL statements to the database
 * @author Jeffrey
 */
class Crud {
    
    // create
    public function insertRow($db, $objTable)
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
    
    // delete    
    public function delete($db, $objTable, $id_found)
    {
        $error  = NULL;
        if($id_found == TRUE)
        {
            try
            {
                $stmt   = $db->prepare($objTable->delete());
                $stmt->bindParam(':id', $objTable->id);
                $stmt->execute();
                // echo $stmt->rowCount();
            }
            catch(PDOException $ex)
            {
                $error  = 'DELETE Error: ' . $ex->getMessage();
            }
        }
        $delete = array(
            'error' => $error,
        );
        return $delete;
    }
    
    // delete by ID    
    public function deleteById($id_field, $id, $db_table, $db)
    {
        $queryDelete = "DELETE FROM {$db_table} WHERE {$id_field} = :{$id_field}";
        try
        {
            $stmt = $db->prepare($queryDelete);
            $stmt->bindParam(':'.$id_field, $id);
            $stmt->execute();
            echo $stmt->rowCount();
        }
        catch(PDOException $e)
        {
            echo 'Error: ' . $e->getMessage();
        }
    }
        
    // read        
    public function read($db,$sql,$parameters,$all)
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
            $error  .= ("<br />{$sql}");
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
    
    // read where
    public function fetchRowsWhere($db, $field, $id, $sql_fetch_all)
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
    
    // sort
    public function return_sort($get, $orderby, $dir, $field)
    {
        $sort = " ORDER BY ";
        if ($get == true)
        {
            $sort .= "{$orderby} {$dir}";
        }
        else
        {
            $sort .= "{$field} ASC";
        }        
        return $sort;
    }
    
    // update    
    public function updateRow($db, $objTable)
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
    
}