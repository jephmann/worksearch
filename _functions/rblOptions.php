<?php
    function rblOptions($default, $input, $name, $value, $db_table, $db, $orientation)
    {
        $qRBL = "select {$value}, {$name} from {$db_table} order by {$name}";
        try
        {
            $rbls = $db->prepare($qRBL);
            $rbls->execute();
        }
        catch(PDOException $ex)
        {
            // Note: On a production website, you should not output $ex->getMessage().
            // It may provide an attacker with helpful information about your code.
            die("Failed to run DropDownList query: " . $ex->getMessage());
        }
        $rblOptions = "<div style=\"float:left;background-color:yellow;font-weight:bold;\">";
        $checked = NULL;
        $options = $rbls->fetchAll();
        foreach($options as $option)
        {
            $optName = $option["{$name}"];
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
?>
