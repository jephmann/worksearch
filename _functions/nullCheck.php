<?php
    function nullCheck($string, $display)
    {
        $text = NULL;
        if(empty($string))
        {
            $text    = "<span style=\"color:red;font-weight:bold;\">{$display}</span>";
        }
        else
        {
            $text    = $string;
        }
        return $text;
    }