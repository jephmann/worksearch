<?php
/**
 * Description of Format
 * Helper class which return strings
 * @author Jeffrey
 */
class Format {    
    
    public static function license($state, $license)
    {
        $format = NULL;
        if(!empty($license))
        {
            $format = $state;
            $four   = substr($license, 0, 4);
            $eight  = substr($license, 4, 4);
            $twelve = substr($license, 8, 4);
            $format .= " {$four} {$eight} {$twelve}";
        }
        return $format;
    }
    
    public static function ssn($string)
    {
        $format = NULL;
        if(!empty($string))
        {
            $three  = substr($string, 0, 3);
            $two    = substr($string, 3, 2);
            $four   = substr($string, 5, 4);
            $format = "{$three}-{$two}-{$four}";
        }
        return $format;
    }
    
    public static function zip($zip5, $zip4)
    {
        $format = NULL;
        if(!empty($zip5))
        {
            $format = $zip5;
            if(!empty($zip4))
            {
                $format .= '-'.$zip4;
            }
        }
        return $format;
    }    
    
    public static function phone($phone, $extension)
    {
        $format = NULL;
        if(!empty($phone))
        {
            $area   = substr($phone, 0, 3);
            $prefix = substr($phone, 3, 3);
            $suffix = substr($phone, 6, 4);
            $format = "({$area}) {$prefix}-{$suffix}";
            if(!empty($extension))
            {
                $format .= " x{$extension}";
            }
        }
        return $format;
    }
    
    public static function fullnameplus($salutation, $name, $suffix)
    {
        $format       = $name;        
        if(!empty($salutation))
        {
            $format   = "$salutation {$format}";
        }
        if(!empty($suffix))
        {
            $format   .= " {$suffix}";
        }
        return $format;
    }
    
    public static function image($src, $alt)
    {
        $format = NULL;        
        $format = "<img src=\"{$src}\" alt=\"{$alt}\" />";
        return $format;
    }    
    
    public static function thead($array_columns)
    {
        $format = "<thead><tr>";
        $asc    = NULL;
        $desc   = NULL;
        $field  = NULL;
        $title  = NULL;
        $url    = strtok($_SERVER["REQUEST_URI"],'?');
        for($i=0; $i<count($array_columns); $i++)
        {
            $title  = $array_columns[$i]['title'];
            $format .= "<th>{$title}";
            if($title == "OPTIONS")
            {
                $format .= "<br /><a title=\"Reset Table\" href=\"{$url}\">- Reset -</a>";
            }
            if(!empty($array_columns[$i]['field']))
            {
                $field  = $array_columns[$i]['field'];
                $desc   = "<a title=\"{$title} Descending\" href=\"?orderby={$field}&dir=DESC\">&darr;</a>";
                $asc    = "<a title=\"{$title} Ascending\" href=\"?orderby={$field}&dir=ASC\">&uarr;</a>";
                $format .= "<br />{$desc}&nbsp;{$asc}";
            }
            $format .= "</th>";
        }
        $format .= "</tr></thead>";
        return $format;
    }    
    
    public static function nullCheck($string, $display)
    {
        $text = NULL;
        if(empty($string))
        {
            $text    = "<span style=\"color:red;font-weight:bold;\">{$display}</span>";
        }
        else
        {
            $text    = $string;
        }
        return $text;
    }
}
