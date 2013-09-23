<?php
    function delete($db, $objTable, $id_found)
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