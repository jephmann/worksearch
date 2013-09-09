<?php
    function delete($db, $id_found, $id, $field, $sql_delete, $location)
    {
        if($id_found == TRUE)
        {
            try
            {
                $stmt = $db->prepare($sql_delete);
                $stmt->bindParam(':'.$field, $id);
                $stmt->execute();
                // echo $stmt->rowCount();
                header($location);
            }
            catch(PDOException $e)
            {
                echo 'Error: ' . $e->getMessage();
            }
        }
    }