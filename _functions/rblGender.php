<?php
    function rblGender($name, $gender)
    {
        $checkedMale    = NULL;
        $checkedFemale  = NULL;
        $checked        = " checked=\"checked\"";
        if($gender=="M")
        {
            $checkedMale    = $checked;
            $checkedFemale  = NULL;
        }
        if($gender=="F")
        {
            $checkedFemale  = $checked;
            $checkedMale    = NULL;
        }
        $rblGender = "";        
        $rblGender .= "\r<input name=\"{$name}\" type=\"radio\" value=\"M\"{$checkedMale} /> Male";
        $rblGender .= "\r<input name=\"{$name}\" type=\"radio\" value=\"F\"{$checkedFemale} /> Female";
        $rblGender .= "\r";
        return $rblGender;
    }