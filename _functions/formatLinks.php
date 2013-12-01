<?php
    function formatEmailLink($title, $email)
    {
        $formatEmailLink = NULL;
        if(!empty($email))
        {
            $a_title            = "title=\"E-Mail for {$title}\"";
            $a_href             = "href=\"mailto:{$email}\"";
            $formatEmailLink    = "<a {$a_title} {$a_href}>{$email}</a>";
        }
        return $formatEmailLink;
    }
    
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
                $text = $name;
            }
            $formatOutsideLink  = "<a {$a_href} {$a_target} {$a_title}>{$text}</a>";
        }
        return $formatOutsideLink;
    }
    
    function formatInsideLink($title, $href, $name)
    {
        $formatInsideLink = NULL;
        if(!empty($href))
        {
            $a_href             = "href=\"{$href}\"";
            $a_title            = "title=\"{$title}\"";
            $text               = NULL;
            if(empty($name))
            {
                $text = $href;
            }
            else
            {
                $text = $name;
            }
            $formatInsideLink  = "<a {$a_href} {$a_title}>{$text}</a>";
        }
        return $formatInsideLink;
    }