<?php
    function return_image($src, $alt)
    {
        $img = NULL;
        
        $img = "<img src=\"{$src}\" alt=\"{$alt}\" />";
        
        
        return $img;
    }