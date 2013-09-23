<?php
    function formatDriversLicense($state, $license)
    {
        $formatDriversLicense = $state;
        if(!empty($license))
        {
            $four = substr($license, 0, 4);
            $eight = substr($license, 4, 4);
            $twelve = substr($license, 8, 4);
            $formatDriversLicense = "{$four} {$eight} {$twelve}";
        }
        return $formatDriversLicense;
    }