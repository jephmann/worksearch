<?php
    function formatPostUS($zip5, $zip4)
    {
        $formatPostUS = NULL;
        if(!empty($zip5))
        {
            $formatPostUS = $zip5;
            if(!empty($zip4))
            {
                $formatPostUS .= '-'.$zip4;
            }
        }
        return $formatPostUS;
    }