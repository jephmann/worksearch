<?php
    function formatSSN($string)
    {
        $formatSSN = NULL;
        if(!empty($string))
        {
            $three = substr($string, 0, 3);
            $two = substr($string, 3, 2);
            $four = substr($string, 5, 4);
            $formatSSN = "{$three}-{$two}-{$four}";
        }
        return $formatSSN;
    }