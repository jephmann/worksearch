<?php
    function formatPhone($phone, $extension)
    {
        $formatPhone = NULL;
        if(!empty($phone))
        {
            $area = substr($phone, 0, 3);
            $prefix = substr($phone, 3, 3);
            $suffix = substr($phone, 6, 4);
            $formatPhone = "({$area}) {$prefix}-{$suffix}";
            if(!empty($extension))
            {
                $formatPhone .= " x{$extension}";
            }
        }
        return $formatPhone;
    }