<?php
    function deleteById($id_field, $id, $db_table, $db)
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
?>
