<?php
    function ddlOptions($db, $default, $value, $display, $object, $concatFields, $sortFields)
    {
        $query = NULL;
        if(empty($concatFields) || empty($sortFields))
        {
            $query = $object->options($value, $display);
        }
        else
        {
            $query = $object->options_concat($value, $concatFields, $display, $sortFields);
        }
        try
        {
            $ddls = $db->prepare($query);
            $ddls->execute();
        }
        catch(PDOException $ex)
        {
            // TODO: convert to status message
            die("Failed to run {$object->table} DropDownList query: " . $ex->getMessage());
        }
        $ddlOptions = "\n<option value=\"\">=== PLEASE SELECT ===</option>";
        $selected = NULL;
        $options = $ddls->fetchAll();
        foreach($options as $option)
        {
            $optDisplay = $option["{$display}"];
            $optValue   = $option["{$value}"];
            if($default == $optValue)
            {
                $selected = " selected";
            }
            else
            {
                $selected = "";
            }
            $ddlOptions .= "\n<option{$selected} value=\"{$optValue}\">{$optDisplay}</option>";
        }
        return $ddlOptions;
    }