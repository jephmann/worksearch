<?php
/**
 * Description of Link
 * Helper class which return hyperlinks
 * @author Jeffrey
 */
class Link {    
    
    public static function email($title, $email)
    {
        $link   = NULL;
        if(!empty($email))
        {
            $a_title    = "title=\"E-Mail for {$title}\"";
            $a_href     = "href=\"mailto:{$email}\"";
            $link       = "<a {$a_title} {$a_href}>{$email}</a>";
        }
        return $link;
    }
    
    public static function outside($title, $href, $name)
    {
        $link   = NULL;
        if(!empty($href))
        {
            $a_href     = "href=\"{$href}\"";
            $a_target   = "target=\"_blank\"";
            $a_title    = "title=\"Outside Link to {$title}\"";
            $text       = NULL;
            if(empty($name))
            {
                $text   = $href;
            }
            else
            {
                $text   = $name;
            }
            $link   = "<a {$a_href} {$a_target} {$a_title}>{$text}</a>";
        }
        return $link;
    }
    
    public static function inside($title, $href, $name)
    {
        $link   = NULL;
        if(!empty($href))
        {
            $a_href     = "href=\"{$href}\"";
            $a_title    = "title=\"{$title}\"";
            $text       = NULL;
            if(empty($name))
            {
                $text   = $href;
            }
            else
            {
                $text   = $name;
            }
            $link       = "<a {$a_href} {$a_title}>{$text}</a>";
        }
        return $link;
    }
    
} 