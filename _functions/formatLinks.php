<?php
    function formatOutsideLink($title, $href, $name)
    {
        $formatOutsideLink = NULL;
        if(!empty($href))
        {
            $a_href             = "href=\"{$href}\"";
            $a_target           = "target=\"_blank\"";
            $a_title            = "title=\"Outside Link to {$title}\"";
            $text               = NULL;
            if(empty($name))
            {
                $text = $href;
            }
            else
            {
                $text = $title;
            }
            $formatOutsideLink  = "<a {$a_href} {$a_target} {$a_title}>{$text}</a>";
        }
        return $formatOutsideLink;
    }