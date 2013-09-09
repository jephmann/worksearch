<?php
    function formatEmailLink($title, $string)
    {
        $formatEmailLink = NULL;
        if(!empty($string))
        {
            $a_title            = "title=\"E-Mail for {$title}\"";
            $a_href             = "href=\"mailto:{$string}\"";
            $formatEmailLink    = "<a {$a_title} {$a_href}>{$string}</a>";
        }
        return $formatEmailLink;
    }