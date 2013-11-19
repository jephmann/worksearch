<?php
    function rblOptions($db, $default, $input, $display, $value, $object, $orientation)
    {
        $result = array(
            'error' => NULL,
            'options'   => NULL,
        );
        $error = NULL;
        $query = $object->options($value, $display);
        try
        {
            $statement = $db->prepare($query);
            $statement->execute();
        }
        catch(PDOException $ex)
        {
            $error  = ("<li>Failed to run {$object->table} RadioButtonList query: " . $ex->getMessage()) . "</li>";
        }
        $rblOptions = NULL;
        $checked = NULL;
        $options = $statement->fetchAll();
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
        $result['options']  = $rblOptions;
        $result['error']    = $error;
        return $result;
    }