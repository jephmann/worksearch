<?php
/**
 * Description of Validation
 * Helper class which return validation messages
 * @author Jeffrey
 */
class Validation {
    
    public static function message($validation_message)
    {
        $li = NULL;
        if(!empty($validation_message))
        {
            $li = ("{$validation_message}");
        }
        if (!empty($li))
        {
            $li = ("<li>{$li}</li>");
        }
        return $li;
    }
    
    public static function required_li($value, $field)
    {
        $li = NULL;
        if(empty($value))
        {
            $li = ("{$field} is required.");
        }
        if (!empty($li))
        {
            $li = ("<li>{$li}</li>");
        }
        return $li;
    }
    
    public static function phone_li($value, $field)
    {
        $li = NULL;
        if(!empty($value))
        {
            if(!preg_match('/^[0-9]+$/',$value))
            {
                $li = ("Only numbers are permitted for a {$field}.");
            }
            elseif(strlen($value) != 10)
            {
                $li = ("A {$field} must be 10 digits, no spaces or punctuation.");
            }
        }
        elseif($value === '0')
        {
            $li = ("A {$field} must be 10 digits, no spaces or punctuation.");
        }
        if (!empty($li))
        {
            $li = ("<li>{$li}</li>");
        }
        return $li;
    }
    
    public static function phone_ext_li($value, $field, $phone)
    {
        $li = NULL;
        if(!empty($value))
        {
            if(!preg_match('/^[0-9]+$/',$value))
            {
                $li = ("Only numbers are permitted for a {$field}.");
            }
            elseif(strlen($value) >= 6)
            {
                $li = ("A {$field} must be 5 digits or less.");
            }
        }
        if(!empty($value) && empty($phone))
        {
            $li .= ("You have a Phone Number Extension without a Phone Number. Please correct.");
        }
        if (!empty($li))
        {
            $li = ("<li>{$li}</li>");
        }
        return $li;
    }
    
    public static function email_li($value, $field)
    {
        $li = NULL;
        if(!empty($value))
        {
            if(!filter_var($value, FILTER_VALIDATE_EMAIL))
            {
                $li = ("Invalid address for {$field}.");
            }
        }
        if (!empty($li))
        {
            $li = ("<li>{$li}</li>");
        }
        return $li;
    }
    
    public static function zip5_li($value, $field)
    {
        $li = NULL;
        if(!empty($value))
        {
            
            if(!preg_match('/^[0-9]+$/',$value))
            {
                $li = ("Only numbers are permitted for a {$field}.");
            }
            elseif(strlen($value) != 5)
            {
                $li = ("A {$field} must be 5 digits.");
            }
        }
        elseif($value === '0')
        {
            $li = ("A {$field} must be 5 digits.");
        }
        if (!empty($li))
        {
            $li = ("<li>{$li}</li>");
        }
        return $li;
    }
    
    public static function zip4_li($value, $field, $zip5)
    {
        $li = NULL;
        if(!empty($value))
        {
            if(!preg_match('/^[0-9]+$/',$value))
            {
                $li = ("Only numbers are permitted for a {$field}.");
            }
            elseif(strlen($value) != 4)
            {
                $li = ("A {$field} must be 4 digits.");
            }
        }        
        elseif($value === '0')
        {
            $li = ("A {$field} must be 4 digits.");
        }
        if(empty($zip5) && !empty($value))
        {
            $li = ("You have a ZIP Code Extension without a ZIP Code. Please correct.");
        }
        if (!empty($li))
        {
            $li = ("<li>{$li}</li>");
        }
        return $li;
    }
}