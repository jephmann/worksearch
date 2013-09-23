<?php
    function returnFullNamePlus($salutation, $name, $suffix)
    {
        $fullNamePlus       = $name;        
        if(!empty($salutation))
        {
            $fullNamePlus   = $salutation.' '.$fullNamePlus;
        }
        if(!empty($suffix))
        {
            $fullNamePlus   = $fullNamePlus .' '.$suffix;
        }
        return $fullNamePlus;
    }