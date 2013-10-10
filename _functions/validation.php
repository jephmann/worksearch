<?php
    function validation_message($validation_message)
    {
        $string = NULL;
        if(!empty($validation_message))
        {
            $string = ("<li>{$validation_message}</li>");
        }
        return $string;
    }
    
    function validate_required_li($value, $field)
    {
        $required = NULL;
        if(empty($value))
        {
            $required = ("<li>{$field} is required.</li>");
        }
        return $required;
    }
    
    function validate_phone_li($value, $field)
    {
        $li = NULL;
        if(!empty($value))
        {
            if(!preg_match('/^[0-9]+$/',$value))
            {
                $li = ("<li>Only numbers are permitted for a {$field}.</li>");
            }
            elseif(strlen($value) != 10)
            {
                $li = ("<li>A {$field} must be 10 digits, no spaces or punctuation.</li>");
            }
        }
        elseif($value === '0')
        {
            $li = ("<li>A {$field} must be 10 digits, no spaces or punctuation.</li>");
        }
        return $li;
    }
    
    function validate_phone_ext_li($value, $field, $phone)
    {
        $li = NULL;
        if(!empty($value))
        {
            if(!preg_match('/^[0-9]+$/',$value))
            {
                $li = ("<li>Only numbers are permitted for a {$field}.</li>");
            }
            elseif(strlen($value) >= 5)
            {
                $li = ("<li>A {$field} must be 4 digits or less.</li>");
            }
        }
        if(!empty($value) && empty($phone))
        {
            $li .= ("<li>You have a Phone Number Extension without a Phone Number. Please correct.</li>");
        }
        return $li;
    }
    
    function validate_email_li($value, $field)
    {
        $li = NULL;
        if(!empty($value))
        {
            if(!filter_var($value, FILTER_VALIDATE_EMAIL))
            {
                $li = ("<li>Invalid address for {$field}.</li>");
            }
        }        
        return $li;
    }
    
    function validate_zip5_li($value, $field)
    {
        $li = NULL;
        if(!empty($value))
        {
            
            if(!preg_match('/^[0-9]+$/',$value))
            {
                $li = ("<li>Only numbers are permitted for a {$field}.</li>");
            }
            elseif(strlen($value) != 5)
            {
                $li = ("<li>A {$field} must be 5 digits.</li>");
            }
        }
        elseif($value === '0')
        {
            $li = ("<li>A {$field} must be 5 digits.</li>");
        }
        return $li;
    }
    
    function validate_zip4_li($value, $field, $zip5)
    {
        $li = NULL;
        if(!empty($value))
        {
            if(!preg_match('/^[0-9]+$/',$value))
            {
                $li = ("<li>Only numbers are permitted for a {$field}.</li>");
            }
            elseif(strlen($value) != 4)
            {
                $li = ("<li>A {$field} must be 4 digits.");
            }
        }        
        elseif($value === '0')
        {
            $li = ("<li>A {$field} must be 4 digits.");
        }
        if(empty($zip5) && !empty($value))
        {
            $li = ("<li>You have a ZIP Code Extension without a ZIP Code. Please correct.</li>");
        }        
        return $li;
    }