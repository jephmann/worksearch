<?php
    function rblTrueFalse($name, $boolean)
    {
        $checkedTrue    = NULL;
        $checkedFalse   = NULL;
        $checked        = "checked=\"checked\"";
        if($boolean==TRUE)
        {
            $checkedTrue    = $checked;
        }
        else
        {
            $checkedFalse   = $checked;
        }        
        $rblTrueFalse = "<input
            name=\"{$name}\"
            type=\"radio\"
            value=\"1\"
            {$checkedTrue} /> Yes
            <input
            name=\"{$name}\"
            type=\"radio\"
            value=\"0\"
            {$checkedFalse} /> No";
        return $rblTrueFalse;
    }
?>
