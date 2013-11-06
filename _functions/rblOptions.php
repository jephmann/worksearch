<?php
    function rblOptions($db, $default, $input, $display, $value, $object, $orientation)
    {       
        $qRBL = $object->options($value, $display);
        try
        {
            $rbls = $db->prepare($qRBL);
            $rbls->execute();
        }
        catch(PDOException $ex)
        {
            // TODO: convert to status message
            die("Failed to run DropDownList query: " . $ex->getMessage());
        }
        $rblOptions = "<div style=\"float:left;background-color:yellow;font-weight:bold;\">";
        $checked = NULL;
        $options = $rbls->fetchAll();
        foreach($options as $option)
        {
            $optName = $option["{$display}"];
            $optValue = $option["{$value}"];
            if($default == $optValue)
            {
                $checked = " checked";
            }
            else
            {
                $checked = "";
            }
            $rblOptions .= "\n<input{$checked} type=\"radio\" name=\"{$input}\" value=\"{$optValue}\" />{$optName}";
            if($orientation == "v")
            {
                $rblOptions .= "<br />";
            }
            else
            {
                $rblOptions .= "&nbsp;&nbsp;";
            }
        }
        $rblOptions .= "</div>";        
        return $rblOptions;
    }