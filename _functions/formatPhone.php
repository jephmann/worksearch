<?php
    function formatPhone($string)
    {
        $formatPhone = NULL;
        $area = substr($string, 0, 3);
        $prefix = substr($string, 3, 3);
        $suffix = substr($string, 6, 4);
        $formatPhone = "({$area}) {$prefix}-{$suffix}";
        return $formatPhone;
    }
?>
