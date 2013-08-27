<?php
    function formatDriversLicense($string)
    {
        $formatDriversLicense = NULL;
        $four = substr($string, 0, 4);
        $eight = substr($string, 4, 4);
        $twelve = substr($string, 8, 4);
        $formatDriversLicense = "{$four} {$eight} {$twelve}";
        return $formatDriversLicense;
    }
?>
