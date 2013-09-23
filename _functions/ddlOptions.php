<?php
    function ddlOptions($db, $default, $value, $name, $db_table)
    {        
        $qDDL = "select {$value}, {$name} from {$db_table} order by {$name}";

        try
        {
            $ddls = $db->prepare($qDDL);
            $ddls->execute();
        }
        catch(PDOException $ex)
        {
            // Note: On a production website, you should not output $ex->getMessage().
            // It may provide an attacker with helpful information about your code.
            die("Failed to run DropDownList query: " . $ex->getMessage());
        }

        $ddlOptions = "\n<option value=\"\">=== PLEASE SELECT ===</option>";
        $selected = NULL;
        $options = $ddls->fetchAll();
        foreach($options as $option)
        {
            $optName = $option["{$name}"];
            $optValue = $option["{$value}"];
            if($default == $optValue)
            {
                $selected = " selected";
            }
            else
            {
                $selected = "";
            }

            $ddlOptions .= "\n<option{$selected} value=\"{$optValue}\">{$optName}</option>";
        }
        return $ddlOptions;
    }

    
    function ddlOptionsAs($db, $default, $value, $concatFields, $name, $sort, $db_table)
    {        
        $qDDL = "select {$value}, Concat({$concatFields}) AS {$name} from {$db_table} order by {$sort}";

        try
        {
            $ddls = $db->prepare($qDDL);
            $ddls->execute();
        }
        catch(PDOException $ex)
        {
            // Note: On a production website, you should not output $ex->getMessage().
            // It may provide an attacker with helpful information about your code.
            die("Failed to run DropDownList query: " . $ex->getMessage());
        }

        $ddlOptions = "\n<option value=\"\">=== PLEASE SELECT ===</option>";
        $selected = NULL;
        $options = $ddls->fetchAll();
        foreach($options as $option)
        {
            $optName = $option["{$name}"];
            $optValue = $option["{$value}"];
            if($default == $optValue)
            {
                $selected = " selected";
            }
            else
            {
                $selected = "";
            }

            $ddlOptions .= "\n<option{$selected} value=\"{$optValue}\">{$optName}</option>";
        }
        return $ddlOptions;
    }