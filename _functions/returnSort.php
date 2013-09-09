<?php
    function return_sort($get, $orderby, $dir, $field)
    {
        $sort = " ORDER BY ";
        if ($get == true)
        {
            $sort .= "{$orderby} {$dir}";
        }
        else
        {
            $sort .= "{$field} ASC";
        }        
        return $sort;
    }