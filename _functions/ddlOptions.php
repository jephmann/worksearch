<?php
    function ddlOptions($db, $default, $value, $display, $object, $concatFields, $sortFields)
    {
        $result = array(
            'error' => NULL,
            'options'   => NULL,
        );
        $error = NULL;
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
            $statement = $db->prepare($query);
            $statement->execute();
        }
        catch(PDOException $ex)
        {
            $error  = ("<li>Failed to run {$object->table} DropDownList query: " . $ex->getMessage()) . "</li>";
        }
        $ddlOptions = "\n<option value=\"\">=== PLEASE SELECT ===</option>";
        $selected = NULL;
        $options = $statement->fetchAll();
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
        $result['options']  = $ddlOptions;
        $result['error']    = $error;
        return $result;
    }